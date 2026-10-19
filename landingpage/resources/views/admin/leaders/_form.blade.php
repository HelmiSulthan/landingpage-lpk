@php $item = $leader ?? null; @endphp

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
    <input type="text" id="name" name="name"
           class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $item->name ?? '') }}" required>
    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label" for="position">Jabatan <span class="text-danger">*</span></label>
    <input type="text" id="position" name="position"
           class="form-control @error('position') is-invalid @enderror"
           value="{{ old('position', $item->position ?? '') }}" required>
    @error('position')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label" for="photo">Foto</label>

    @if($item?->photo)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}"
                 style="width:100px;height:100px;object-fit:cover;border-radius:50%" class="border">
        </div>
    @endif

    <input type="file" id="photo" name="photo" accept=".jpg,.jpeg,.png,.webp"
           class="form-control @error('photo') is-invalid @enderror">
    @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
    <div class="form-text">JPG, PNG, atau WEBP. Maks 2MB.{{ $item?->photo ? ' Kosongkan jika tidak ingin mengganti.' : '' }}</div>
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.leaders.index') }}" class="btn btn-outline-secondary">Batal</a>
</div>
