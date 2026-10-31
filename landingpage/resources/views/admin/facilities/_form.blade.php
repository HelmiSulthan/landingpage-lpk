@php $item = $facility ?? null; @endphp

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
    <label class="form-label" for="name">Nama Fasilitas <span class="text-danger">*</span></label>
    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $item->name ?? '') }}" required>
    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label" for="icon">Ikon (class Bootstrap Icons)</label>
    <input type="text" id="icon" name="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon', $item->icon ?? '') }}">
    @error('icon')<div class="invalid-feedback">{{ $message }}</div>@enderror
    <div class="form-text">Contoh: bi bi-wifi. Daftar ikon: icons.getbootstrap.com</div>
</div>

<div class="mb-3">
    <label class="form-label" for="description">Deskripsi</label>
    @include('admin.components.quill-editor', ['fieldName' => 'description', 'value' => old('description', $item->description ?? ''), 'minHeight' => 150])
    @error('description')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label" for="image">Gambar (opsional)</label>

    @if($item?->image)
        <div class="mb-2 d-flex align-items-center gap-3">
            <img src="{{ asset('storage/' . $item->image) }}" alt="" style="max-height:120px" class="img-thumbnail">
            <label class="d-flex align-items-center gap-1 text-danger small" style="cursor:pointer">
                <input type="checkbox" name="remove_image" value="1"> Hapus foto
            </label>
        </div>
    @endif

    <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png,.webp" class="form-control @error('image') is-invalid @enderror">
    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
    <div class="form-text">JPG, PNG, atau WEBP. Maksimal 2 MB.{{ $item?->image ? ' Kosongkan jika tidak ingin mengganti.' : '' }}</div>
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.facilities.index') }}" class="btn btn-outline-secondary">Batal</a>
</div>