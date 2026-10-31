@extends('admin.layouts.app')

@section('title', 'Pengaturan Website')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">
        Pengaturan Website
    </h1>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    @if($errors->any())

        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <form action="{{ route('admin.settings.update') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="card p-4">

            <h5 class="mb-3">Informasi Utama</h5>

            <div class="mb-3">
                <label>Nama Instansi</label>
                <input type="text" name="site_name" class="form-control" value="{{ $setting->site_name ?? '' }}">
            </div>

            <div class="mb-3">
                <label>Tagline</label>
                <input type="text" name="tagline" class="form-control" value="{{ $setting->tagline ?? '' }}">
            </div>

            <div class="mb-3">
                <label>Judul Hero</label>
                <input type="text" name="hero_title" class="form-control" value="{{ $setting->hero_title ?? '' }}">
            </div>

            <div class="mb-3">
                <label>Deskripsi Hero</label>
                @include('admin.components.quill-editor', ['fieldName' => 'hero_description', 'value' => $setting->hero_description ?? '', 'minHeight' => 120])
            </div>

            <hr>

            <h5 class="mb-3">Profil</h5>

            <div class="mb-3">
                @include('admin.components.quill-editor', ['fieldName' => 'profile', 'value' => $setting->profile ?? '', 'minHeight' => 180])
            </div>

            <div class="row mb-3">

                <div class="col-md-4">
                    <label class="form-label">Foto Atasan</label>

                    @if($setting->leader_photo)
                        <div class="mb-2 d-flex align-items-center gap-3">
                            <img src="{{ asset('storage/' . $setting->leader_photo) }}"
                                 alt="Atasan"
                                 style="width:80px;height:80px;object-fit:cover;border-radius:50%;border:3px solid #fee2e2">
                            <label class="d-flex align-items-center gap-1 text-danger small" style="cursor:pointer">
                                <input type="checkbox" name="remove_leader_photo" value="1"> Hapus foto
                            </label>
                        </div>
                    @endif

                    <input type="file" name="leader_photo" accept=".jpg,.jpeg,.png,.webp" class="form-control">
                    <div class="form-text">JPG, PNG, WEBP. Maks 2MB.{{ $setting->leader_photo ? ' Kosongkan jika tidak ingin mengganti.' : '' }}</div>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Nama Atasan</label>
                    <input type="text" name="leader_name" class="form-control"
                           value="{{ old('leader_name', $setting->leader_name ?? '') }}"
                           placeholder="Contoh: Budi Santoso">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Jabatan Atasan</label>
                    <input type="text" name="leader_position" class="form-control"
                           value="{{ old('leader_position', $setting->leader_position ?? '') }}"
                           placeholder="Contoh: Kepala LPK">
                </div>

            </div>

            <h5 class="mb-3">Visi</h5>

            <div class="mb-3">
                @include('admin.components.quill-editor', ['fieldName' => 'vision', 'value' => $setting->vision ?? '', 'minHeight' => 150])
            </div>

            <h5 class="mb-3">Misi</h5>

            <div class="mb-3">
                <small class="text-muted d-block mb-2">
                    Tulis setiap poin misi pada baris baru. Setiap baris akan otomatis diberi nomor urut.
                </small>
                @include('admin.components.quill-editor', ['fieldName' => 'mission', 'value' => $setting->mission ?? '', 'minHeight' => 200])
            </div>

            <hr>

            <h5 class="mb-3">Statistik</h5>

            <div class="row">

                <div class="col-md-3">
                    <label>Peserta</label>
                    <input type="number" name="students_count" class="form-control" value="{{ $setting->students_count ?? 0 }}">
                </div>

                <div class="col-md-3">
                    <label>Lulusan</label>
                    <input type="number" name="graduates_count" class="form-control" value="{{ $setting->graduates_count ?? 0 }}">
                </div>

                <div class="col-md-3">
                    <label>Bekerja di Jepang</label>
                    <input type="number" name="japan_count" class="form-control" value="{{ $setting->japan_count ?? 0 }}">
                </div>

                <div class="col-md-3">
                    <label>Tahun Pengalaman</label>
                    <input type="number" name="experience_years" class="form-control" value="{{ $setting->experience_years ?? 0 }}">
                </div>

            </div>

            <hr>

            <h5 class="mb-3">Kontak</h5>

            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="address" class="form-control" value="{{ $setting->address ?? '' }}">
            </div>

            <div class="mb-3">
                <label>Telepon</label>
                <input type="text" name="phone" class="form-control" value="{{ $setting->phone ?? '' }}">
            </div>

            <div class="mb-3">
                <label>WhatsApp</label>
                <input type="text" name="whatsapp" class="form-control" value="{{ $setting->whatsapp ?? '' }}">
            </div>

            <div class="mb-3">
                <label>Instagram</label>
                <input type="url" name="instagram" class="form-control"
                       value="{{ old('instagram', $setting->instagram ?? '') }}"
                       placeholder="https://instagram.com/username">
            </div>

            <div class="mb-3">
                <label>TikTok</label>
                <input type="url" name="tiktok" class="form-control"
                       value="{{ old('tiktok', $setting->tiktok ?? '') }}"
                       placeholder="https://tiktok.com/@username">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $setting->email ?? '' }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Google Maps Embed URL</label>
                <input type="text" name="maps_embed" class="form-control"
                       value="{{ old('maps_embed', $setting->maps_embed ?? '') }}"
                       placeholder="https://www.google.com/maps/embed?pb=...">
                <div class="form-text">
                    Buka <a href="https://maps.google.com" target="_blank">Google Maps</a>,
                    cari lokasi → klik <strong>Bagikan</strong> → <strong>Sematkan peta</strong> → salin URL dari <code>src="..."</code> saja.
                </div>
            </div>

            <button class="btn btn-primary">Simpan Perubahan</button>

        </div>

    </form>

    {{-- CARD FOTO HERO --}}
    <div class="card p-4 mt-4" id="hero-images">

        <h5 class="mb-1">Foto Latar Hero</h5>
        <p class="text-muted small mb-3">
            Foto akan tampil bergantian sebagai latar belakang hero (slideshow otomatis tiap 5 detik).
            Rekomendasi: lebar minimal 1800px, rasio landscape. Maks 4MB per file.
        </p>

        <form action="{{ route('admin.hero-images.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
            @csrf
            <div class="d-flex gap-2 align-items-center flex-wrap">
                <input type="file" name="images[]" class="form-control" accept=".jpg,.jpeg,.png,.webp" multiple required style="max-width:400px">
                <button type="submit" class="btn btn-primary btn-sm">Unggah</button>
            </div>
            @error('images')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </form>

        @if($heroImages->isEmpty())
            <p class="text-muted small">Belum ada foto. Jika kosong, hero menggunakan foto default.</p>
        @else
            <div class="row g-3">
                @foreach($heroImages as $img)
                <div class="col-md-3 col-sm-4 col-6">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $img->image) }}" alt="Hero" class="card-img-top" style="height:120px;object-fit:cover">
                        <div class="card-body p-2">
                            <form action="{{ route('admin.hero-images.destroy', $img) }}" method="POST"
                                  onsubmit="return confirm('Hapus foto ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger w-100">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif

    </div>

</div>

@endsection
