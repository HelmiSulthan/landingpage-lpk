@extends('admin.layouts.app')

@section('title', 'Edit Program')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">Edit Program</h1>

    <form action="{{ route('admin.programs.update', $program) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card p-4">
            @include('admin.programs._form')
        </div>
    </form>

</div>

@endsection