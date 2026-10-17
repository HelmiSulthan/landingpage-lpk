@extends('admin.layouts.app')

@section('title', 'Tambah Pertanyaan')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">Tambah Pertanyaan</h1>

    <form action="{{ route('admin.faqs.store') }}" method="POST">
        @csrf

        <div class="card p-4">
            @include('admin.faqs._form')
        </div>
    </form>

</div>

@endsection
