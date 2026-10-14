@php $item = $program ?? null; @endphp

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
    <label class="form-label" for="name">Nama Program <span class="text-danger">*</span></label>
    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $item->name ?? '') }}" required>
    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label" for="description">Deskripsi</label>
    <textarea id="description" name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $item->description ?? '') }}</textarea>
    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label" for="image">Gambar</label>

    @if($item?->image)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $item->image) }}" alt="" style="max-height:120px" class="img-thumbnail">
        </div>
    @endif

    <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png,.webp" class="form-control @error('image') is-invalid @enderror">
    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
    <div class="form-text">JPG, PNG, atau WEBP. Maksimal 2 MB.{{ $item?->image ? ' Kosongkan jika tidak ingin mengganti.' : '' }}</div>
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.programs.index') }}" class="btn btn-outline-secondary">Batal</a>
</div>