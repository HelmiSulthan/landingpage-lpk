@php $item = $gallery ?? null; @endphp

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
    <label class="form-label" for="title">Judul Dokumentasi <span class="text-danger">*</span></label>
    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $item->title ?? '') }}" required>
    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label" for="image">Foto <span class="text-danger">*</span></label>

    @if($item?->image)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $item->image) }}" alt="" style="max-height:120px" class="img-thumbnail">
        </div>
    @endif

    <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png,.webp" class="form-control @error('image') is-invalid @enderror" @if(!$item?->image) required @endif>
    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
    <div class="form-text">JPG, PNG, atau WEBP. Maksimal 2 MB.{{ $item?->image ? ' Kosongkan jika tidak ingin mengganti.' : '' }}</div>
</div>

<div class="mb-3">
    <label class="form-label" for="description">Deskripsi</label>
    @include('admin.components.quill-editor', ['fieldName' => 'description', 'value' => old('description', $item->description ?? ''), 'minHeight' => 120])
    @error('description')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.galleries.index') }}" class="btn btn-outline-secondary">Batal</a>
</div>
