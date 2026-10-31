@php $item = $user ?? null; @endphp

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mb-3">
    <label class="form-label">Nama <span class="text-danger">*</span></label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $item->name ?? '') }}" required>
    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label">Email <span class="text-danger">*</span></label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
           value="{{ old('email', $item->email ?? '') }}" required>
    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label">Password {{ $item ? '(kosongkan jika tidak ingin mengubah)' : '' }} <span class="text-danger">{{ $item ? '' : '*' }}</span></label>
    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
           {{ $item ? '' : 'required' }} autocomplete="new-password">
    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
    <div class="form-text">Minimal 8 karakter.</div>
</div>

<div class="mb-3">
    <label class="form-label">Role <span class="text-danger">*</span></label>
    <select name="role" class="form-select @error('role') is-invalid @enderror" required>
        <option value="admin"       {{ old('role', $item->role ?? '') === 'admin'       ? 'selected' : '' }}>Admin</option>
        <option value="super_admin" {{ old('role', $item->role ?? '') === 'super_admin' ? 'selected' : '' }}>Super Admin</option>
    </select>
    @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
    <div class="form-text">
        <strong>Admin</strong>: mengelola konten landing page. &nbsp;
        <strong>Super Admin</strong>: admin + bisa kelola akun user.
    </div>
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Batal</a>
</div>
