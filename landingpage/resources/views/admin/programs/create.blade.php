@extends('admin.layouts.app')

@section('title', 'Tambah Program')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">Tambah Program</h1>

    <form action="{{ route('admin.programs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card p-4">
            @include('admin.programs._form')
        </div>
    </form>

</div>

@endsection