@extends('admin.layouts.app')

@section('title', 'Program')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Program</h1>
        <a href="{{ route('admin.programs.create') }}" class="btn btn-primary">+ Tambah Program</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th style="width:160px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($programs as $item)
                    <tr>
                        <td style="width:90px">
                            @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="" class="rounded" style="width:64px;height:64px;object-fit:cover">
                            @else
                            <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $item->name ?? '-' }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($item->description, 80) }}</td>
                        <td>
                            <a href="{{ route('admin.programs.edit', $item) }}" class="btn btn-sm btn-outline-primary">Edit</a>

                            <form action="{{ route('admin.programs.destroy', $item) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">Belum ada data.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $programs->links() }}
    </div>

</div>

@endsection