@extends('admin.layouts.app')

@section('title', 'Log Aktivitas')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">Log Aktivitas</h1>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width:50px">No</th>
                        <th>Admin</th>
                        <th>Aksi</th>
                        <th>Modul</th>
                        <th>Deskripsi</th>
                        <th>IP</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                    <tr>
                        <td>{{ $logs->firstItem() + $loop->index }}</td>
                        <td>{{ $log->user?->name ?? '-' }}</td>
                        <td>
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
                            <span class="badge bg-{{ $badge }}">{{ $label }}</span>
                        </td>
                        <td>{{ $log->module }}</td>
                        <td>{{ $log->description }}</td>
                        <td>{{ $log->ip_address ?? '-' }}</td>
                        <td>{{ $log->created_at->diffForHumans() }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Belum ada aktivitas tercatat.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $logs->links() }}
    </div>

</div>

@endsection
