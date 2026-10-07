@extends('admin.layouts.app')

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

    <form action="{{ route('admin.settings.update') }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="card p-4">

            <h5 class="mb-3">
                Informasi Utama
            </h5>

            <div class="mb-3">

                <label>Nama Instansi</label>

                <input
                    type="text"
                    name="site_name"
                    class="form-control"
                    value="{{ $setting->site_name ?? '' }}"
                >

            </div>


            <div class="mb-3">

                <label>Tagline</label>

                <input
                    type="text"
                    name="tagline"
                    class="form-control"
                    value="{{ $setting->tagline ?? '' }}"
                >

            </div>


            <div class="mb-3">

                <label>Judul Hero</label>

                <input
                    type="text"
                    name="hero_title"
                    class="form-control"
                    value="{{ $setting->hero_title ?? '' }}"
                >

            </div>


            <div class="mb-3">

                <label>Deskripsi Hero</label>

                <textarea
                    name="hero_description"
                    class="form-control"
                    rows="4"
                >{{ $setting->hero_description ?? '' }}</textarea>

            </div>


            <hr>


            <h5 class="mb-3">
                Profil
            </h5>

            <div class="mb-3">

                <textarea
                    name="profile"
                    class="form-control"
                    rows="6"
                >{{ $setting->profile ?? '' }}</textarea>

            </div>


            <h5 class="mb-3">
                Visi
            </h5>

            <div class="mb-3">

                <textarea
                    name="vision"
                    class="form-control"
                    rows="5"
                >{{ $setting->vision ?? '' }}</textarea>

            </div>


            <h5 class="mb-3">
                Misi
            </h5>

            <div class="mb-3">

                <textarea
                    name="mission"
                    class="form-control"
                    rows="7"
                >{{ $setting->mission ?? '' }}</textarea>

            </div>


            <hr>


            <h5 class="mb-3">
                Statistik
            </h5>

            <div class="row">

                <div class="col-md-3">

                    <label>Peserta</label>

                    <input
                        type="number"
                        name="students_count"
                        class="form-control"
                        value="{{ $setting->students_count ?? 0 }}"
                    >

                </div>


                <div class="col-md-3">

                    <label>Lulusan</label>

                    <input
                        type="number"
                        name="graduates_count"
                        class="form-control"
                        value="{{ $setting->graduates_count ?? 0 }}"
                    >

                </div>


                <div class="col-md-3">

                    <label>Bekerja di Jepang</label>

                    <input
                        type="number"
                        name="japan_count"
                        class="form-control"
                        value="{{ $setting->japan_count ?? 0 }}"
                    >

                </div>


                <div class="col-md-3">

                    <label>Tahun Pengalaman</label>

                    <input
                        type="number"
                        name="experience_years"
                        class="form-control"
                        value="{{ $setting->experience_years ?? 0 }}"
                    >

                </div>

            </div>


            <hr>


            <h5 class="mb-3">
                Kontak
            </h5>

            <div class="mb-3">

                <label>Alamat</label>

                <input
                    type="text"
                    name="address"
                    class="form-control"
                    value="{{ $setting->address ?? '' }}"
                >

            </div>


            <div class="mb-3">

                <label>WhatsApp</label>

                <input
                    type="text"
                    name="whatsapp"
                    class="form-control"
                    value="{{ $setting->whatsapp ?? '' }}"
                >

            </div>


            <div class="mb-3">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ $setting->email ?? '' }}"
                >

            </div>


            <button class="btn btn-primary">
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>

@endsection