@extends('admin.layouts.app')

@section('title', 'Edit Fasilitas')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">Edit Fasilitas</h1>

    <form action="{{ route('admin.facilities.update', $facility) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card p-4">
            @include('admin.facilities._form')
        </div>
    </form>

</div>

@endsection