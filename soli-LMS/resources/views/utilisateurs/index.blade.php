@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Utilisateurs</h1>
    <a href="{{ route('utilisateurs.create') }}" class="btn btn-primary">Create Utilisateur</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($utilisateurs as $utilisateur)
            <tr>
                <td>{{ $utilisateur->id }}</td>
                <td>{{ $utilisateur->nom }}</td>
                <td>{{ $utilisateur->email }}</td>
                <td>{{ $utilisateur->role }}</td>
                <td>
                    <a href="{{ route('utilisateurs.show', $utilisateur) }}" class="btn btn-info">View</a>
                    <a href="{{ route('utilisateurs.edit', $utilisateur) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('utilisateurs.destroy', $utilisateur) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
