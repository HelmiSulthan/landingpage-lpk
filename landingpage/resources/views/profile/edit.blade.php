@extends('admin.layouts.app')

@section('title', 'Profil Akun')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">Profil Akun</h1>

    @if (session('status') === 'profile-updated')
        <div class="alert alert-success">Informasi profil berhasil diperbarui.</div>
    @elseif (session('status') === 'password-updated')
        <div class="alert alert-success">Password berhasil diperbarui.</div>
    @endif

    <div class="row g-4">

        {{-- INFORMASI PROFIL --}}
        <div class="col-lg-6">
            <div class="card p-4 h-100">
                <h5 class="mb-1">Informasi Profil</h5>
                <p class="text-muted small mb-3">Perbarui nama dan alamat email akun Anda.</p>

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input id="name" name="name" type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $user->email) }}" required autocomplete="username">
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Profil</button>
                </form>
            </div>
        </div>

        {{-- UBAH PASSWORD --}}
        <div class="col-lg-6">
            <div class="card p-4 h-100">
                <h5 class="mb-1">Ubah Password</h5>
                <p class="text-muted small mb-3">Gunakan kombinasi password yang kuat dan aman.</p>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="update_password_current_password" class="form-label">Password Saat Ini</label>
                        <input id="update_password_current_password" name="current_password" type="password"
                               class="form-control {{ $errors->updatePassword->has('current_password') ? 'is-invalid' : '' }}"
                               autocomplete="current-password">
                        @if($errors->updatePassword->has('current_password'))
                            <div class="invalid-feedback">{{ $errors->updatePassword->first('current_password') }}</div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="update_password_password" class="form-label">Password Baru</label>
                        <input id="update_password_password" name="password" type="password"
                               class="form-control {{ $errors->updatePassword->has('password') ? 'is-invalid' : '' }}"
                               autocomplete="new-password">
                        @if($errors->updatePassword->has('password'))
                            <div class="invalid-feedback">{{ $errors->updatePassword->first('password') }}</div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="update_password_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                        <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                               class="form-control {{ $errors->updatePassword->has('password_confirmation') ? 'is-invalid' : '' }}"
                               autocomplete="new-password">
                        @if($errors->updatePassword->has('password_confirmation'))
                            <div class="invalid-feedback">{{ $errors->updatePassword->first('password_confirmation') }}</div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Perbarui Password</button>
                </form>
            </div>
        </div>

        {{-- HAPUS AKUN --}}
        <div class="col-12">
            <div class="card p-4 border-danger">
                <h5 class="text-danger mb-1">Hapus Akun</h5>
                <p class="text-muted small mb-3">
                    Setelah akun dihapus, seluruh sesi dan akses akun ini akan dihapus secara permanen.
                </p>

                <form method="POST" action="{{ route('profile.destroy') }}"
                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini secara permanen?')">
                    @csrf
                    @method('delete')

                    <div class="row g-2 align-items-start" style="max-width: 480px;">
                        <div class="col-sm-8">
                            <input id="delete_password" name="password" type="password"
                                   class="form-control {{ $errors->userDeletion->has('password') ? 'is-invalid' : '' }}"
                                   placeholder="Masukkan password untuk konfirmasi">
                            @if($errors->userDeletion->has('password'))
                                <div class="invalid-feedback">{{ $errors->userDeletion->first('password') }}</div>
                            @endif
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-danger w-100">Hapus Akun</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>

@endsection
