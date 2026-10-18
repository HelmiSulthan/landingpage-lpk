@extends('admin.layouts.app')

@section('title', 'Foto Hero')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">Foto Latar Hero</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card p-4 mb-4">
        <h5 class="mb-3">Unggah Foto Baru</h5>
        <p class="text-muted small mb-3">Bisa pilih beberapa file sekaligus. Rekomendasi: ukuran minimal 1800px lebar, rasio landscape. Maks 4MB per file.</p>
        <form action="{{ route('admin.hero-images.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="file" name="images[]" id="images" class="form-control" accept=".jpg,.jpeg,.png,.webp" multiple required>
                @error('images')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-primary">Unggah</button>
        </form>
    </div>

    <h5 class="mb-3">Foto yang Sudah Diunggah</h5>

    @if($heroImages->isEmpty())
        <p class="text-center text-muted py-4">Belum ada foto. Foto yang diunggah akan tampil sebagai latar belakang hero dengan slideshow otomatis.</p>
    @else
        <div class="row g-3">
            @foreach($heroImages as $item)
            <div class="col-md-3 col-sm-4 col-6">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="Hero" class="card-img-top" style="height:140px;object-fit:cover">
                    <div class="card-body p-2 text-center">
                        <form action="{{ route('admin.hero-images.destroy', $item) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Hapus foto ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif

</div>

@endsection
