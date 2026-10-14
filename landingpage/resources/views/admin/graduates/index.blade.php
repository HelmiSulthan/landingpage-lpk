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