@extends('admin.layouts.app')

@section('title', 'Manajemen User')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Manajemen User</h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">+ Tambah User</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Dibuat</th>
                        <th style="width:160px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $item)
                    <tr>
                        <td>
                            {{ $item->name }}
                            @if($item->id === auth()->id())
                            <span class="badge bg-secondary ms-1">Anda</span>
                            @endif
                        </td>
                        <td>{{ $item->email }}</td>
                        <td>
                            @if($item->role === 'super_admin')
                                <span class="badge bg-danger">Super Admin</span>
                            @else
                                <span class="badge bg-primary">Admin</span>
                            @endif
                        </td>
                        <td>{{ $item->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $item) }}" class="btn btn-sm btn-outline-primary">Edit</a>

                            @if($item->id !== auth()->id())
                            <form action="{{ route('admin.users.destroy', $item) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Hapus user {{ $item->name }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                            @endif
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

    <div class="mt-3">{{ $users->links() }}</div>

</div>

@endsection
