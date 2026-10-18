@extends('admin.layouts.app')

@section('title', 'Tambah Dokumentasi')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">Tambah Dokumentasi</h1>

    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card p-4">
            @include('admin.galleries._form')
        </div>
    </form>

</div>

@endsection
