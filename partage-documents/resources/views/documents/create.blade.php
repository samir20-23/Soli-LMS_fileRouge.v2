@extends('layouts.app')

@section('title', 'Add Document')

@section('content')
<form action="{{ route('documents.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" name="titre" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="chemin_fichier">Fichier</label>
        <input type="file" name="chemin_fichier" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Document</button>
</form>
@endsection
