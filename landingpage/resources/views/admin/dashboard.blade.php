@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">
        Dashboard
    </h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @php
        $storageLinkValid = realpath(public_path('storage')) !== false
            && realpath(public_path('storage')) === realpath(storage_path('app/public'));
    @endphp
    @if(! $storageLinkValid)
    <div class="alert alert-warning d-flex justify-content-between align-items-center mb-4">
        <div>
            <i class="bi bi-info-circle me-1"></i> <strong>Pemberitahuan:</strong> Tautan folder publik storage belum dibuat atau tidak valid.
        </div>
        <form action="{{ route('admin.storage.link') }}" method="POST" class="ms-3 mb-0">
            @csrf
            <button type="submit" class="btn btn-sm btn-dark">Hubungkan Sekarang (storage:link)</button>
        </form>
    </div>
    @endif

    <div class="row g-3">

        <div class="col-6 col-md-4 col-xl">
            <div class="card p-4 h-100">
                <h6 class="text-muted">Fasilitas</h6>
                <h2 class="mb-0">{{ $facilitiesCount }}</h2>
            </div>
        </div>

        <div class="col-6 col-md-4 col-xl">
            <div class="card p-4 h-100">
                <h6 class="text-muted">Alur Pendaftaran</h6>
                <h2 class="mb-0">{{ $programsCount }}</h2>
            </div>
        </div>

        <div class="col-6 col-md-4 col-xl">
            <div class="card p-4 h-100">
                <h6 class="text-muted">Lulusan</h6>
                <h2 class="mb-0">{{ $graduatesCount }}</h2>
            </div>
        </div>

        <div class="col-6 col-md-6 col-xl">
            <div class="card p-4 h-100">
                <h6 class="text-muted">QnA</h6>
                <h2 class="mb-0">{{ $faqsCount ?? 0 }}</h2>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl">
            <div class="card p-4 h-100">
                <h6 class="text-muted">Galeri</h6>
                <h2 class="mb-0">{{ $galleriesCount ?? 0 }}</h2>
            </div>
        </div>

    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Aktivitas Terbaru</h5>
                    <a href="{{ route('admin.activity-logs.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    @if($recentActivities->isEmpty())
                        <p class="text-center text-muted py-4 mb-0">Belum ada aktivitas tercatat.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>Admin</th>
                                        <th>Aksi</th>
                                        <th>Modul</th>
                                        <th>Deskripsi</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentActivities as $log)
                                    @php
                                        $badge = match($log->action) {
                                            'create' => 'success',
                                            'update' => 'primary',
                                            'delete' => 'danger',
                                            default  => 'secondary',
                                        };
                                        $label = match($log->action) {
                                            'create' => 'Tambah',
                                            'update' => 'Edit',
                                            'delete' => 'Hapus',
                                            default  => ucfirst($log->action),
                                        };
                                    @endphp
                                    <tr>
                                        <td>{{ $log->user?->name ?? '-' }}</td>
                                        <td><span class="badge bg-{{ $badge }}">{{ $label }}</span></td>
                                        <td>{{ $log->module }}</td>
                                        <td>{{ $log->description }}</td>
                                        <td>{{ $log->created_at->diffForHumans() }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
