@extends('admin.layouts.app')

@section('title', 'Statistik Lulusan')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">Statistik Lulusan</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- CARD UPLOAD --}}
    <div class="card p-4 mb-4">
        <h5 class="mb-1">Upload Data dari Excel</h5>
        <p class="text-muted small mb-3">
            Format kolom: <strong>A = Kategori</strong>, <strong>B = Label</strong>, <strong>C = Total</strong>.
            Baris pertama adalah header. Upload akan <strong>mengganti</strong> semua data yang ada.
            <a href="{{ route('admin.graduate-stats.template') }}" class="ms-2">
                <i class="bi bi-download me-1"></i>Download Template Excel
            </a>
        </p>
        <form action="{{ route('admin.graduate-stats.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @error('excel')<div class="alert alert-danger py-2 mb-2">{{ $message }}</div>@enderror
            <div class="d-flex gap-2 align-items-center flex-wrap">
                <input type="file" name="excel" class="form-control" accept=".xlsx,.xls,.csv" required style="max-width:380px">
                <button type="submit" class="btn btn-primary btn-sm">Import</button>
            </div>
        </form>
    </div>

    {{-- TABEL DATA --}}
    @if($stats->isEmpty())
        <p class="text-center text-muted py-4">Belum ada data statistik. Upload file Excel untuk memulai.</p>
    @else
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Data Saat Ini</h5>
            <form action="{{ route('admin.graduate-stats.destroy') }}" method="POST"
                  onsubmit="return confirm('Hapus semua data statistik?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">
                    <i class="bi bi-trash me-1"></i>Hapus Semua Data
                </button>
            </form>
        </div>

        <div class="row g-4">
            @foreach($stats as $category => $items)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-header fw-bold bg-light">{{ $category }}</div>
                    <div class="table-responsive">
                        <table class="table table-sm mb-0">
                            <thead>
                                <tr>
                                    <th>Label</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->label }}</td>
                                    <td class="text-end fw-bold">{{ number_format($item->total) }}</td>
                                </tr>
                                @endforeach
                                <tr class="table-light">
                                    <td class="fw-bold">Total</td>
                                    <td class="text-end fw-bold text-primary">{{ number_format($items->sum('total')) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif

</div>

@endsection
