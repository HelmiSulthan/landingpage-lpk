@extends('admin.layouts.app')

@section('title', 'Lulusan')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Lulusan</h1>
        <a href="{{ route('admin.graduates.create') }}" class="btn btn-primary">+ Tambah Lulusan</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- CARD LINK GOOGLE DRIVE --}}
    <div class="card p-4 mb-4">
        <h5 class="mb-1"><i class="bi bi-google me-2 text-danger"></i>Link Google Drive Lulusan</h5>
        <p class="text-muted small mb-3">
            Link ini akan tampil sebagai tombol <strong>"Selengkapnya"</strong> di section Lulusan pada landing page.
            Biarkan kosong jika tidak ingin menampilkan tombol.
        </p>
        <form action="{{ route('admin.graduates.gdrive') }}" method="POST">
            @csrf
            @error('graduates_gdrive_link')
            <div class="alert alert-danger py-2 mb-2">{{ $message }}</div>
            @enderror
            <div class="d-flex gap-2 align-items-center flex-wrap">
                <input type="url"
                       name="graduates_gdrive_link"
                       class="form-control"
                       value="{{ old('graduates_gdrive_link', $setting->graduates_gdrive_link ?? '') }}"
                       placeholder="https://drive.google.com/..."
                       style="max-width: 500px">
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                @if($setting->graduates_gdrive_link)
                <a href="{{ $setting->graduates_gdrive_link }}" target="_blank" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-box-arrow-up-right me-1"></i>Buka Link
                </a>
                @endif
            </div>
        </form>
    </div>

    {{-- TABEL LULUSAN --}}
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Posisi</th>
                        <th>Lokasi</th>
                        <th style="width:160px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($graduates as $item)
                    <tr>
                        <td style="width:90px">
                            @if($item->photo)
                            <img src="{{ asset('storage/' . $item->photo) }}" alt="" class="rounded" style="width:64px;height:64px;object-fit:cover">
                            @else
                            <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $item->name ?? '-' }}</td>
                        <td>{{ $item->position ?? '-' }}</td>
                        <td>{{ $item->location ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.graduates.edit', $item) }}" class="btn btn-sm btn-outline-primary">Edit</a>

                            <form action="{{ route('admin.graduates.destroy', $item) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Belum ada data.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $graduates->links() }}
    </div>

</div>

@endsection
