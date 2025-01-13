@extends('adminlte::page')

@section('title', 'Upload Document')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<script src="{{ mix('js/app.js') }}"></script>
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
