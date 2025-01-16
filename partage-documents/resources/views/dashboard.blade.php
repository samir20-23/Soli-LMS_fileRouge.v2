@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="small-box bg-success p-4 rounded shadow">
            <div class="inner text-white">
                <h4>Total Documents</h4>
                <p>{{ $totalDocuments }}</p>
            </div>
            <div class="icon text-white">
                <i class="fa fa-file"></i>
            </div>
            <a href="{{ route('documents.index') }}" class="small-box-footer text-white d-flex justify-content-between align-items-center">
                Plus de détails
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="small-box bg-info p-4 rounded shadow">
            <div class="inner text-white">
                <h4>Total Ressources</h4>
                <p>{{ $totalRessources }}</p>
            </div>
            <div class="icon text-white">
                <i class="fa fa-database"></i>
            </div>
            <a href="{{ route('ressources.index') }}" class="small-box-footer text-white d-flex justify-content-between align-items-center">
                Plus de détails
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
@endsection
