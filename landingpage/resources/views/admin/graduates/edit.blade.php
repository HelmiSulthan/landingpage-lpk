@extends('admin.layouts.app')

@section('title', 'Edit Lulusan')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">Edit Lulusan</h1>

    <form action="{{ route('admin.graduates.update', $graduate) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card p-4">
            @include('admin.graduates._form')
        </div>
    </form>

</div>

@endsection