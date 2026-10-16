@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">
        Dashboard
    </h1>

    <div class="row g-4">

        <div class="col-md-3">
            <div class="card p-4">
                <h6>Fasilitas</h6>
                <h2>{{ $facilitiesCount }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-4">
                <h6>Program</h6>
                <h2>{{ $programsCount }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-4">
                <h6>Lulusan</h6>
                <h2>{{ $graduatesCount }}</h2>
            </div>
        </div>

    </div>

</div>

@endsection