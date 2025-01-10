# Step 1: Install Laravel
composer create-project --prefer-dist laravel/laravel 21-Partage-de-documents
cd 21-Partage-de-documents
php artisan serve

# Step 2: Install AdminLTE
composer require "acacha/admin-lte-template-laravel:~3.0"
php artisan vendor:publish --provider="Acacha\AdminLteTemplateLaravel\AdminLteServiceProvider"
npm install && npm run dev
php artisan adminlte:install

# Step 3: Set Up Database
# Create the database "partage_documents" in MySQL
# Update the .env file with your database credentials
# Example:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=partage_documents
# DB_USERNAME=root
# DB_PASSWORD=

# Step 4: Create Migrations for Documents and Resources
php artisan make:migration create_documents_table --create=documents
php artisan make:migration create_resources_table --create=resources

# Edit the migration files
# Documents Table
public function up()
{
    Schema::create('documents', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->string('file_path');
        $table->timestamps();
    });
}

# Resources Table
public function up()
{
    Schema::create('resources', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('details')->nullable();
        $table->unsignedBigInteger('document_id');
        $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
        $table->timestamps();
    });
}

# Step 5: Run the Migrations
php artisan migrate

# Step 6: Create Models for Documents and Resources
php artisan make:model Document
php artisan make:model Resource

# Edit the models
# Document Model
public function resources()
{
    return $this->hasMany(Resource::class);
}

# Resource Model
public function document()
{
    return $this->belongsTo(Document::class);
}

# Step 7: Create Controllers for Documents and Resources
php artisan make:controller DocumentController --resource
php artisan make:controller ResourceController --resource

# Step 8: Define Routes
# In routes/web.php
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ResourceController;

Route::resource('documents', DocumentController::class);
Route::resource('resources', ResourceController::class);

Route::middleware('auth')->group(function () {
    Route::resource('documents', DocumentController::class);
    Route::resource('resources', ResourceController::class);
});

# Step 9: Create Views
# Documents Index View (resources/views/documents/index.blade.php)
@extends('adminlte::page')
@section('content')
<h1>Documents</h1>
<a href="{{ route('documents.create') }}" class="btn btn-primary">Upload Document</a>
<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($documents as $document)
        <tr>
            <td>{{ $document->title }}</td>
            <td>{{ $document->description }}</td>
            <td>
                <a href="{{ route('documents.show', $document->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('documents.destroy', $document->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

# Create Document View (resources/views/documents/create.blade.php)
@extends('adminlte::page')
@section('content')
<h1>Upload Document</h1>
<form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="file">File</label>
        <input type="file" name="file" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Upload</button>
</form>
@endsection

# Step 10: Implement CRUD Operations in Controllers
# DocumentController (app/Http/Controllers/DocumentController.php)

# Store Method
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
    ]);

    $filePath = $request->file('file')->store('documents');

    Document::create([
        'title' => $request->title,
        'description' => $request->description,
        'file_path' => $filePath,
    ]);

    return redirect()->route('documents.index')->with('success', 'Document uploaded successfully.');
}

# Index Method
public function index()
{
    $documents = Document::all();
    return view('documents.index', compact('documents'));
}

# Step 11: Add Authentication
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
php artisan migrate

# Step 12: Run the Project
php artisan serve
