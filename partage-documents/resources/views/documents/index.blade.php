@extends('layouts.app')

@section('title', 'Documents')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Documents</h3>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $document)
                <tr>
                    <td>{{ $document->id }}</td>
                    <td>{{ $document->titre }}</td>
                    <td>{{ $document->created_at }}</td>
                    <td>
                        <a href="#" class="btn btn-info">View</a>
                        <a href="#" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
