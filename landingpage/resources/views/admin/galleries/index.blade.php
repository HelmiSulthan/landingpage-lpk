@extends('admin.layouts.app')

@section('title', 'Galeri')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Galeri Dokumentasi</h1>
        <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">+ Tambah Dokumentasi</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($galleries->isEmpty())
        <p class="text-center text-muted py-4">Belum ada dokumentasi.</p>
    @else
        <div class="row g-3">
            @foreach($galleries as $item)
            <div class="col-md-3">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="card-img-top" style="height:160px;object-fit:cover">
                    <div class="card-body">
                        <h6 class="card-title mb-1">{{ $item->title }}</h6>
                        @if($item->description)
                        <p class="text-muted small mb-2">{{ \Illuminate\Support\Str::limit($item->description, 60) }}</p>
                        @endif
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.galleries.edit', $item) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.galleries.destroy', $item) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Hapus dokumentasi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-3">
            {{ $galleries->links() }}
        </div>
    @endif

</div>

@endsection
