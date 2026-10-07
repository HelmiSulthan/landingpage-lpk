@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">
        Dashboard
    </h1>

    <div class="row g-4">

        <div class="col-md-3">
            <div class="card p-4">
                <h6>Fasilitas</h6>
                <h2>{{ \App\Models\Facility::count() }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-4">
                <h6>Program</h6>
                <h2>{{ \App\Models\Program::count() }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-4">
                <h6>Lulusan</h6>
                <h2>{{ \App\Models\Graduate::count() }}</h2>
            </div>
        </div>

    </div>

</div>

@endsection