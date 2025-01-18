<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Dashboard - Partage de Documents et Ressources</h1>

    <!-- Document Section -->
    <div class="mb-5">
        <h2>Documents</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Validation</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($documents as $document)
                <tr>
                    <td>{{ $document->titre }}</td>
                    <td>{{ ucfirst($document->etat_validation) }}</td>
                    <td>
                        {{-- @if(auth()->user()->role === 'Formateur' && $document->etat_validation === 'en_attente') --}}
                        <form action="{{ route('documents.approve', $document) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Valider</button>
                        </form>
                        {{-- @else --}}
                        <span class="text-muted">N/A</span>
                        {{-- @endif --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Upload Document -->
        <h3 class="mt-4">Upload Document</h3>
        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="chemin_fichier">Fichier</label>
                <input type="file" name="chemin_fichier" id="chemin_fichier" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Upload</button>
        </form>
    </div>

    <!-- Resource Section -->
    <div>
        <h2>Ressources</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ressources as $ressource)
                <tr>
                    <td>{{ $ressource->nom }}</td>
                    <td>{{ $ressource->type }}</td>
                    <td>{{ $ressource->description }}</td>
                    <td>
                        @if(auth()->user()->role === 'Formateur')
                        <a href="{{ route('ressources.edit', $ressource) }}" class="btn btn-warning btn-sm">Edit</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Upload Resource -->
        {{-- @if(auth()->user()->role === 'Formateur') --}}
        <h3 class="mt-4">Upload Ressource</h3>
        <form action="{{ route('ressources.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" name="type" id="type" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Upload</button>
        </form>
        {{-- @endif --}}
    </div>
</div>
@endsection
