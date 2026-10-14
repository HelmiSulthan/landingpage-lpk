@extends('admin.layouts.app')

@section('title', 'Tambah Fasilitas')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">Tambah Fasilitas</h1>

    <form action="{{ route('admin.facilities.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card p-4">
            @include('admin.facilities._form')
        </div>
    </form>

</div>

@endsection