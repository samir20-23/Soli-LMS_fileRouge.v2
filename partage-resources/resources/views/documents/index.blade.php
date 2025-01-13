
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
    