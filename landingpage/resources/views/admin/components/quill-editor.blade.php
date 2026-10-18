@php
    $editorId   = 'quill_' . $fieldName . '_' . uniqid();
    $hiddenId   = 'hidden_' . $fieldName . '_' . uniqid();
    $toolbarId  = 'toolbar_' . $editorId;
    $minHeight  = $minHeight ?? 150;
@endphp

<div id="{{ $toolbarId }}">
    <span class="ql-formats">
        <select class="ql-header">
            <option value="1">Heading 1</option>
            <option value="2">Heading 2</option>
            <option value="3">Heading 3</option>
            <option selected>Normal</option>
        </select>
    </span>
    <span class="ql-formats">
        <button class="ql-bold"></button>
        <button class="ql-italic"></button>
        <button class="ql-underline"></button>
        <button class="ql-strike"></button>
    </span>
    <span class="ql-formats">
        <button class="ql-list" value="ordered"></button>
        <button class="ql-list" value="bullet"></button>
        <button class="ql-indent" value="-1"></button>
        <button class="ql-indent" value="+1"></button>
    </span>
    <span class="ql-formats">
        <button class="ql-link"></button>
        <button class="ql-blockquote"></button>
    </span>
    <span class="ql-formats">
        <button class="ql-clean"></button>
    </span>
</div>

<div id="{{ $editorId }}" style="min-height: {{ $minHeight }}px">
    {!! old($fieldName, $value ?? '') !!}
</div>

<textarea id="{{ $hiddenId }}" name="{{ $fieldName }}" class="d-none">{{ old($fieldName, $value ?? '') }}</textarea>

@push('scripts')
<script>
(function () {
    const quill = new Quill('#{{ $editorId }}', {
        theme: 'snow',
        modules: { toolbar: '#{{ $toolbarId }}' }
    });

    const hiddenInput = document.getElementById('{{ $hiddenId }}');

    // Sync ke hidden textarea setiap kali konten berubah
    quill.on('text-change', function () {
        hiddenInput.value = quill.getSemanticHTML();
    });

    // Sync saat form submit (jaga-jaga)
    hiddenInput.closest('form')?.addEventListener('submit', function () {
        hiddenInput.value = quill.getSemanticHTML();
    });
})();
</script>
@endpush
