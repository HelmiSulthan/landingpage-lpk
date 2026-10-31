@php $item = $graduate ?? null; @endphp

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
    <label class="form-label" for="name">Nama <span class="text-danger">*</span></label>
    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $item->name ?? '') }}" required>
    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label" for="position">Posisi / Pekerjaan</label>
    <input type="text" id="position" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position', $item->position ?? '') }}">
    @error('position')<div class="invalid-feedback">{{ $message }}</div>@enderror
    <div class="form-text">Ditampilkan di landing page</div>
</div>

<div class="mb-3">
    <label class="form-label" for="location">Lokasi (mis. Tokyo, Jepang)</label>
    <input type="text" id="location" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location', $item->location ?? '') }}">
    @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
    <div class="form-text">Dipakai bila posisi kosong</div>
</div>

<div class="mb-3">
    <label class="form-label" for="description">Testimoni / Deskripsi</label>
    @include('admin.components.quill-editor', ['fieldName' => 'description', 'value' => old('description', $item->description ?? ''), 'minHeight' => 150])
    @error('description')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label" for="photo">Foto</label>

    @if($item?->photo)
        <div class="mb-2 d-flex align-items-center gap-3">
            <img src="{{ asset('storage/' . $item->photo) }}" alt="" style="max-height:120px" class="img-thumbnail">
            <label class="d-flex align-items-center gap-1 text-danger small" style="cursor:pointer">
                <input type="checkbox" name="remove_photo" value="1"> Hapus foto
            </label>
        </div>
    @endif

    <input type="file" id="photo" name="photo" accept=".jpg,.jpeg,.png,.webp" class="form-control @error('photo') is-invalid @enderror">
    @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
    <div class="form-text">JPG, PNG, atau WEBP. Maksimal 2 MB.{{ $item?->photo ? ' Kosongkan jika tidak ingin mengganti.' : '' }}</div>
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.graduates.index') }}" class="btn btn-outline-secondary">Batal</a>
</div>
