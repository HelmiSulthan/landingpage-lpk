@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')

<div class="container-fluid">
    <h1 class="mb-4">Edit User</h1>
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card p-4">
            @include('admin.users._form')
        </div>
    </form>
</div>

@endsection
