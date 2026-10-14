@extends('admin.layouts.app')

@section('title', 'Tambah Lulusan')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">Tambah Lulusan</h1>

    <form action="{{ route('admin.graduates.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card p-4">
            @include('admin.graduates._form')
        </div>
    </form>

</div>

@endsection