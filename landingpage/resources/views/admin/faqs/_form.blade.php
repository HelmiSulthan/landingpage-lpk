@php $item = $faq ?? null; @endphp

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
    <label class="form-label" for="question">Pertanyaan <span class="text-danger">*</span></label>
    <input type="text" id="question" name="question" class="form-control @error('question') is-invalid @enderror" value="{{ old('question', $item->question ?? '') }}" required>
    @error('question')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label" for="answer">Jawaban <span class="text-danger">*</span></label>
    <textarea id="answer" name="answer" rows="6" class="form-control @error('answer') is-invalid @enderror">{{ old('answer', $item->answer ?? '') }}</textarea>
    @error('answer')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.faqs.index') }}" class="btn btn-outline-secondary">Batal</a>
</div>
