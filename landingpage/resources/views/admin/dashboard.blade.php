@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">
        Dashboard
    </h1>

    <div class="row g-4">

        <div class="col-md-3">
            <div class="card p-4">
                <h6>Fasilitas</h6>
                <h2>{{ $facilitiesCount }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-4">
                <h6>Program</h6>
                <h2>{{ $programsCount }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-4">
                <h6>Lulusan</h6>
                <h2>{{ $graduatesCount }}</h2>
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
