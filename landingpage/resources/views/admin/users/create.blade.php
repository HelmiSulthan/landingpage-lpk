@extends('admin.layouts.app')

@section('title', 'Tambah User')

@section('content')

<div class="container-fluid">
    <h1 class="mb-4">Tambah User</h1>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="card p-4">
            @include('admin.users._form')
        </div>
    </form>
</div>

@endsection
