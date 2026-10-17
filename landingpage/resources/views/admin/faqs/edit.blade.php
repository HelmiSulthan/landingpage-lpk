@extends('admin.layouts.app')

@section('title', 'Edit Pertanyaan')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">Edit Pertanyaan</h1>

    <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card p-4">
            @include('admin.faqs._form')
        </div>
    </form>

</div>

@endsection
