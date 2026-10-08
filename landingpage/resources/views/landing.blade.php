<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ $setting->site_name ?? 'LPK Jepang' }}
    </title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f5f5f5;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: auto;
        }

        header {
            background: #111827;
            color: white;
            padding: 20px 0;
        }

        section {
            background: white;
            margin: 20px 0;
            padding: 30px;
            border-radius: 10px;
        }

        .card {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 10px 0;
            border-radius: 8px;
        }
    </style>
</head>

<body>

<header>
    <div class="container">

        <h1>
            {{ $setting->site_name ?? 'LPK Jepang' }}
        </h1>

        <p>
            {{ $setting->tagline ?? 'Pelatihan Kerja ke Jepang' }}
        </p>

    </div>
</header>


<div class="container">

    {{-- HERO --}}
    <section>

        <h1>
            {{ $setting->hero_title ?? 'Selamat Datang' }}
        </h1>

        <p>
            {{ $setting->hero_description ?? 'Lembaga pelatihan kerja untuk persiapan bekerja ke Jepang.' }}
        </p>

    </section>


    {{-- PROFIL --}}
    <section>

        <h2>Profil</h2>

        <p>
            {{ $setting->profile ?? 'Profil lembaga belum diisi.' }}
        </p>

    </section>


    {{-- VISI --}}
    <section>

        <h2>Visi</h2>

        <p>
            {{ $setting->vision ?? 'Visi belum diisi.' }}
        </p>

        <h2>Misi</h2>

        <p>
            {{ $setting->mission ?? 'Misi belum diisi.' }}
        </p>

    </section>


    {{-- STATISTIK --}}
    <section>

        <h2>Statistik</h2>

        <div class="card">
            <strong>{{ $setting->students_count ?? 0 }}</strong>
            <p>Peserta Didik</p>
        </div>

        <div class="card">
            <strong>{{ $setting->graduates_count ?? 0 }}</strong>
            <p>Lulusan</p>
        </div>

        <div class="card">
            <strong>{{ $setting->japan_count ?? 0 }}</strong>
            <p>Disalurkan ke Jepang</p>
        </div>

        <div class="card">
            <strong>{{ $setting->experience_years ?? 0 }}</strong>
            <p>Tahun Pengalaman</p>
        </div>

    </section>


    {{-- FASILITAS --}}
    <section>

        <h2>Fasilitas</h2>

        @forelse($facilities as $facility)

            <div class="card">

                <h3>
                    {{ $facility->name }}
                </h3>

                <p>
                    {{ $facility->description }}
                </p>

            </div>

        @empty

            <p>Belum ada fasilitas.</p>

        @endforelse

    </section>


    {{-- PROGRAM --}}
    <section>

        <h2>Program</h2>

        @forelse($programs as $program)

            <div class="card">

                <h3>
                    {{ $program->name }}
                </h3>

                <p>
                    {{ $program->description }}
                </p>

            </div>

        @empty

            <p>Belum ada program.</p>

        @endforelse

    </section>


    {{-- LULUSAN --}}
    <section>

        <h2>Lulusan</h2>

        @forelse($graduates as $graduate)

            <div class="card">

                <h3>
                    {{ $graduate->name }}
                </h3>

                <p>
                    {{ $graduate->position }}
                </p>

                <p>
                    {{ $graduate->location }}
                </p>

                <p>
                    {{ $graduate->description }}
                </p>

            </div>

        @empty

            <p>Belum ada data lulusan.</p>

        @endforelse

    </section>


    {{-- KONTAK --}}
    <section>

        <h2>Kontak</h2>

        <p>
            {{ $setting->address ?? '-' }}
        </p>

        <p>
            {{ $setting->phone ?? '-' }}
        </p>

        <p>
            {{ $setting->email ?? '-' }}
        </p>

    </section>

</div>

</body>
</html>