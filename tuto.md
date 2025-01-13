Sure! Here's a step-by-step guide to creating a Laravel project with AdminLTE, including all the necessary steps and code.

---

### **Step 1: Install Laravel**
Create a new Laravel project via Composer. Open your terminal or command prompt and run:

```bash
composer create-project --prefer-dist laravel/laravel SoliLMS
cd SoliLMS
```

This will create a new Laravel project in a folder named `SoliLMS`.

---

### **Step 2: Install AdminLTE for Laravel**
AdminLTE is a popular admin dashboard template. To integrate it with your Laravel project, you can use the Laravel AdminLTE package.

1. **Install the Laravel AdminLTE package**:
```bash
composer require jeroennoten/laravel-adminlte
```

2. **Publish the package’s assets**:
```bash
php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider"
```

This will publish the AdminLTE views, configuration, and assets to your Laravel application.

---

### **Step 3: Set up Authentication**
You can set up Laravel's built-in authentication for user login and registration.

1. **Install Laravel UI** (for authentication scaffolding):
```bash
composer require laravel/ui
```

2. **Generate authentication scaffolding**:
```bash
php artisan ui bootstrap --auth
npm install
npm run dev
```

This will generate the necessary views for login, registration, and password reset, and compile the frontend assets.

3. **Run the migrations**:
```bash
php artisan migrate
```

This creates the necessary tables for users in your database.

---

### **Step 4: Set Up Routes and Controllers**

Create a controller for handling the document upload functionality.

1. **Create the Document Controller**:
```bash
php artisan make:controller DocumentController
```

2. **Add the upload function to `DocumentController.php`**:
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function upload(Request $request)
    {
        // Validate and upload the file
        $request->validate([
            'document' => 'required|file|mimes:pdf,docx,txt|max:10240',
        ]);

        $file = $request->file('document');
        $path = $file->storeAs('documents', $file->getClientOriginalName());

        Document::create([
            'titre' => $file->getClientOriginalName(),
            'chemin_fichier' => $path,
        ]);

        return redirect()->route('documents.index');
    }

    public function index()
    {
        $documents = Document::all();
        return view('documents.index', compact('documents'));
    }
}
```

---

### **Step 5: Create the Document Model and Migration**
1. **Create the Document model**:
```bash
php artisan make:model Document -m
```

2. **Add the migration code** for creating the documents table in the `database/migrations/{date}_create_documents_table.php` file:
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('chemin_fichier');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
```

3. **Run the migration**:
```bash
php artisan migrate
```

---

### **Step 6: Create Views for Document Management**

1. **Create a Blade view for the document upload form** in `resources/views/documents/create.blade.php`:
```blade
@extends('adminlte::page')

@section('title', 'Upload Document')

@section('content_header')
    <h1>Upload Document</h1>
@stop

@section('content')
    <form action="{{ route('documents.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="document">Document</label>
            <input type="file" name="document" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
@stop
```

2. **Create a Blade view for listing documents** in `resources/views/documents/index.blade.php`:
```blade
@extends('adminlte::page')

@section('title', 'Documents')

@section('content_header')
    <h1>Documents List</h1>
@stop

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>File</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $document)
                <tr>
                    <td>{{ $document->titre }}</td>
                    <td><a href="{{ Storage::url($document->chemin_fichier) }}" target="_blank">View</a></td>
                    <td>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
```

---

### **Step 7: Update Routes**
Open `routes/web.php` and add the following routes for document upload and display:

```php
use App\Http\Controllers\DocumentController;

Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
Route::post('/documents/upload', [DocumentController::class, 'upload'])->name('documents.upload');
```

---

### **Step 8: Set Up AdminLTE Layout**
Ensure you’re using the AdminLTE layout for the pages by updating your `resources/views/layouts/app.blade.php` or directly in the `create.blade.php` and `index.blade.php` files, as shown in the above views.

Make sure your `config/adminlte.php` file is configured to use AdminLTE's default layout.

---

### **Step 9: Create Document Model**
As shown in Step 5, make sure your `app/Models/Document.php` file looks like this:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'chemin_fichier',
    ];
}
```

---

### **Step 10: Test Your Application**

1. Run the application using:
```bash
php artisan serve
```

2. Open the application in your browser (`http://localhost:8000`), log in, and test the document upload and display features.

---

### **Conclusion**
This is a basic Laravel project setup with AdminLTE for managing document uploads and sharing. You can expand this further by adding more functionality like user roles, access control, and categorization for the documents.

Let me know if you need more detailed explanations or further customization for your project!