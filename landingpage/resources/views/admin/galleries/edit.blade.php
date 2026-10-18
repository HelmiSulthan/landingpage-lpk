@extends('admin.layouts.app')

@section('title', 'Edit Dokumentasi')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">Edit Dokumentasi</h1>

    <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card p-4">
            @include('admin.galleries._form')
        </div>
    </form>

</div>

@endsection
