<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LPK Kelas Jepang Pangandaran | Pelatihan Kerja ke Jepang</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Noto+Sans+JP:wght@400;500;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary: #b91c1c;
            --primary-dark: #991b1b;
            --dark: #111827;
            --light: #f8fafc;
            --gray: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--dark);
            background: #ffffff;
        }

        html {
            scroll-behavior: smooth;
        }

        /* NAVBAR */
        .navbar {
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 15px rgba(0, 0, 0, .06);
            padding: 15px 0;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 21px;
            color: var(--primary);
        }

        .navbar-brand span {
            color: var(--dark);
        }

        .nav-link {
            font-weight: 500;
            color: #374151 !important;
            margin-left: 15px;
        }

        .nav-link:hover {
            color: var(--primary) !important;
        }

        .btn-primary-custom {
            background: var(--primary);
            color: white;
            padding: 11px 22px;
            border-radius: 8px;
            font-weight: 600;
            border: none;
            text-decoration: none;
            display: inline-block;
            transition: .3s;
        }

        .btn-primary-custom:hover {
            background: var(--primary-dark);
            color: white;
            transform: translateY(-2px);
        }

        /* HERO */
        .hero {
            min-height: 680px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            background:
                linear-gradient(90deg, rgba(255, 255, 255, .98) 0%, rgba(255, 255, 255, .92) 48%, rgba(255, 255, 255, .25) 100%),
                url('https://images.unsplash.com/photo-1528360983277-13d401cdc186?auto=format&fit=crop&w=1800&q=80');
            background-size: cover;
            background-position: center;
        }

        .hero-content {
            max-width: 650px;
        }

        .badge-japan {
            display: inline-block;
            background: #fee2e2;
            color: var(--primary);
            padding: 8px 15px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: clamp(40px, 5vw, 64px);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 22px;
        }

        .hero h1 span {
            color: var(--primary);
        }

        .hero p {
            font-size: 18px;
            line-height: 1.8;
            color: #4b5563;
            margin-bottom: 30px;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn-outline-custom {
            padding: 11px 22px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            text-decoration: none;
            color: var(--dark);
            font-weight: 600;
            background: white;
        }

        /* SECTION */
        section {
            padding: 90px 0;
        }

        .section-label {
            color: var(--primary);
            font-size: 14px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 10px;
        }

        .section-title {
            font-size: 38px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .section-description {
            color: var(--gray);
            line-height: 1.8;
            max-width: 700px;
        }

        /* PROFILE */
        .profile-image {
            width: 100%;
            height: 450px;
            object-fit: cover;
            border-radius: 20px;
        }

        .profile-text {
            line-height: 1.9;
            color: #64748b;
        }

        .profile-list {
            list-style: none;
            padding: 0;
            margin-top: 25px;
        }

        .profile-list li {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .profile-list i {
            color: var(--primary);
            font-size: 20px;
        }

        /* VISI MISI */
        .vision-card {
            background: var(--primary);
            color: white;
            border-radius: 20px;
            padding: 40px;
            height: 100%;
        }

        .vision-card h3 {
            font-weight: 800;
            margin-bottom: 20px;
        }

        .vision-card p {
            line-height: 1.8;
            opacity: .95;
        }

        .mission-card {
            background: #f8fafc;
            border-radius: 20px;
            padding: 40px;
            height: 100%;
        }

        .mission-item {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .mission-number {
            min-width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #fee2e2;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
        }

        /* FACILITIES */
        .facility-section {
            background: #f8fafc;
        }

        .facility-card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            height: 100%;
            border: 1px solid #e5e7eb;
            transition: .3s;
        }

        .facility-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, .08);
        }

        .facility-icon {
            width: 58px;
            height: 58px;
            background: #fee2e2;
            color: var(--primary);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            margin-bottom: 20px;
        }

        .facility-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .facility-card h4 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .facility-card p {
            color: var(--gray);
            line-height: 1.7;
            margin: 0;
        }

        /* PROGRAM */
        .program-card {
            border-radius: 18px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
            height: 100%;
            background: white;
            display: flex;
            flex-direction: column;
            cursor: pointer;
            transition: .3s;
        }

        .program-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, .08);
        }

        .program-card img {
            width: 100%;
            height: 210px;
            object-fit: cover;
        }

        .program-content {
            padding: 25px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .program-content h4 {
            font-weight: 700;
            margin-bottom: 10px;
        }

        .program-content p {
            color: var(--gray);
            line-height: 1.7;
            /* Truncate: tampilkan max 3 baris */
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex: 1;
        }

        .program-detail-btn {
            margin-top: 16px;
            font-size: 14px;
            font-weight: 600;
            color: var(--primary);
            background: #fee2e2;
            border: none;
            padding: 7px 16px;
            border-radius: 8px;
            cursor: pointer;
            align-self: flex-start;
            transition: .2s;
        }

        .program-detail-btn:hover {
            background: var(--primary);
            color: white;
        }

        /* Modal program */
        .modal-program .modal-header {
            border-bottom: none;
            padding-bottom: 0;
        }

        .modal-program .modal-img {
            width: 100%;
            max-height: 280px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .modal-program .modal-body {
            padding: 28px;
        }

        .modal-program .modal-title {
            font-size: 22px;
            font-weight: 800;
        }

        .modal-program .modal-desc {
            color: var(--gray);
            line-height: 1.8;
            white-space: pre-line;
        }

        /* STATISTIC */
        .stats {
            background: var(--dark);
            color: white;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 45px;
            font-weight: 800;
            color: #fca5a5;
        }

        .stat-label {
            color: #cbd5e1;
            margin-top: 5px;
        }

        /* GRADUATE */
        .graduate-card {
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 25px;
            height: 100%;
            transition: .3s;
        }

        .graduate-card:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, .08);
            transform: translateY(-5px);
        }

        .graduate-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 18px;
        }

        .graduate-card h5 {
            font-weight: 700;
        }

        .graduate-card p {
            color: var(--gray);
            font-size: 14px;
            line-height: 1.7;
        }

        .graduate-position {
            color: var(--primary);
            font-size: 14px;
            font-weight: 700;
        }

        /* QnA */
        .qna-section {
            background: #f8fafc;
        }

        .qna-accordion .accordion-item {
            border: 1px solid #e5e7eb;
            border-radius: 12px !important;
            margin-bottom: 14px;
            overflow: hidden;
            background: white;
        }

        .qna-accordion .accordion-button {
            font-weight: 600;
            font-size: 17px;
            color: var(--dark);
            padding: 20px 24px;
        }

        .qna-accordion .accordion-button:not(.collapsed) {
            background: #fee2e2;
            color: var(--primary);
        }

        .qna-accordion .accordion-button:focus {
            box-shadow: none;
        }

        .qna-accordion .accordion-body {
            padding: 22px 24px;
            color: var(--gray);
            line-height: 1.8;
            font-size: 15px;
        }

        /* CTA */
        .cta {
            padding: 80px 0;
        }

        .cta-box {
            background:
                linear-gradient(135deg, rgba(127, 29, 29, .95), rgba(185, 28, 28, .92)),
                url('https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?auto=format&fit=crop&w=1500&q=80');
            background-size: cover;
            background-position: center;
            border-radius: 25px;
            padding: 70px 50px;
            color: white;
            text-align: center;
        }

        .cta-box h2 {
            font-size: 40px;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .cta-box p {
            max-width: 650px;
            margin: 0 auto 30px;
            color: #fee2e2;
            line-height: 1.8;
        }

        .btn-white {
            background: white;
            color: var(--primary);
            padding: 12px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 700;
            display: inline-block;
        }

        /* FOOTER */
        footer {
            background: #0f172a;
            color: white;
            padding: 60px 0 25px;
        }

        footer h5 {
            font-weight: 700;
            margin-bottom: 20px;
        }

        footer p,
        footer li {
            color: #94a3b8;
            line-height: 1.8;
        }

        footer ul {
            list-style: none;
            padding: 0;
        }

        footer li {
            margin-bottom: 8px;
        }

        footer a {
            color: #94a3b8;
            text-decoration: none;
        }

        footer a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid #1e293b;
            margin-top: 40px;
            padding-top: 20px;
            color: #64748b;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .hero {
                min-height: 600px;
                background:
                    linear-gradient(rgba(255, 255, 255, .93), rgba(255, 255, 255, .93)),
                    url('https://images.unsplash.com/photo-1528360983277-13d401cdc186?auto=format&fit=crop&w=1200&q=80');
            }

            section {
                padding: 65px 0;
            }

            .section-title {
                font-size: 30px;
            }

            .cta-box {
                padding: 50px 25px;
            }

            .cta-box h2 {
                font-size: 30px;
            }
        }


        /* HORIZONTAL SLIDER: FASILITAS & LULUSAN */
        .facility-slider,
        .graduate-slider {
            display: flex;
            flex-wrap: nowrap;
            gap: 24px;
            overflow-x: auto;
            overflow-y: hidden;
            padding: 10px 4px 20px;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
        }

        .facility-slider>*,
        .graduate-slider>* {
            flex: 0 0 calc((100% - 48px) / 3);
            min-width: 0;
            scroll-snap-align: start;
        }

        /* Scrollbar */
        .facility-slider::-webkit-scrollbar,
        .graduate-slider::-webkit-scrollbar {
            height: 8px;
        }

        .facility-slider::-webkit-scrollbar-thumb,
        .graduate-slider::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .facility-slider::-webkit-scrollbar-track,
        .graduate-slider::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }

        /* Tablet */
        @media (max-width: 991.98px) {

            .facility-slider>*,
            .graduate-slider>* {
                flex-basis: calc((100% - 24px) / 2);
            }
        }

        /* HP */
        @media (max-width: 575.98px) {

            .facility-slider>*,
            .graduate-slider>* {
                flex-basis: 85%;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">

            <a class="navbar-brand" href="#beranda">
                {{ $setting->site_name ?? 'LPK Kelas Jepang Pangandaran' }}
            </a>

            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link" href="#profil">Profil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#visi-misi">Visi & Misi</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#fasilitas">Fasilitas</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#program">Program</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#lulusan">Lulusan</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#qna">QnA</a>
                    </li>

                    <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                        <a href="#kontak" class="btn-primary-custom">
                            Hubungi Kami
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>


    <!-- HERO -->
    <section class="hero" id="beranda">

        <div class="container">

            <div class="hero-content">

                <div class="badge-japan">
                    🇯🇵 Pelatihan & Penyaluran Kerja ke Jepang
                </div>

                <h1>
                    {{ $setting->hero_title ?? 'Pelatihan Kerja ke Jepang' }}
                </h1>

                <p>
                    {{ $setting->hero_description ?? 'Mempersiapkan generasi muda Indonesia untuk bekerja di Jepang.' }}
                </p>

                <div class="hero-buttons">

                    <a href="#program" class="btn-primary-custom">
                        Lihat Program
                    </a>

                    <a href="#profil" class="btn-outline-custom">
                        Tentang Kami
                    </a>

                </div>

            </div>

        </div>

    </section>


    <!-- PROFIL -->
    <section id="profil">

        <div class="container">

            <div class="row align-items-center g-5">

                <div class="col-lg-6">

                    <img
                        src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1000&q=80"
                        class="profile-image"
                        alt="Pelatihan Siswa">

                </div>

                <div class="col-lg-6">

                    <div class="section-label">
                        Profil Lembaga
                    </div>

                    <h2 class="section-title">
                        Membentuk SDM Indonesia yang Siap Bersaing
                    </h2>

                    <p class="profile-text">
                        {{ $setting->profile ?? 'Profil lembaga belum tersedia.' }}
                    </p>

                    <ul class="profile-list">

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Pelatihan bahasa Jepang secara bertahap</span>
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Pembekalan keterampilan kerja</span>
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Pembinaan disiplin dan budaya kerja Jepang</span>
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Pendampingan persiapan kerja ke Jepang</span>
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </section>


    <!-- VISI MISI -->
    <section id="visi-misi" class="bg-light">

        <div class="container">

            <div class="text-center mb-5">

                <div class="section-label">
                    Visi & Misi
                </div>

                <h2 class="section-title">
                    Komitmen Kami
                </h2>

                <p>
                    {{ $setting->vision }}
                </p>

            </div>

            <div class="row g-4">

                <!-- VISI -->
                <div class="col-lg-5">

                    <div class="vision-card">

                        <h3>
                            <i class="bi bi-eye me-2"></i>
                            Visi
                        </h3>

                        <p>
                            {{ $setting->vision ?? 'Visi belum tersedia.' }}
                        </p>

                    </div>

                </div>

                <!-- MISI -->
                <div class="col-lg-7">

                    <div class="mission-card">

                        <h3 class="fw-bold mb-4">
                            Misi
                        </h3>

                        @php
                            $misiItems = array_filter(
                                array_map('trim', explode("\n", $setting->mission ?? '')),
                                fn($line) => $line !== ''
                            );
                        @endphp

                        @forelse(array_values($misiItems) as $index => $misi)
                        <div class="mission-item">
                            <div class="mission-number">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </div>
                            <p>{{ $misi }}</p>
                        </div>
                        @empty
                        <p class="text-muted">Misi belum tersedia.</p>
                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- FASILITAS -->
    <section id="fasilitas" class="facility-section">

        <div class="container">

            <div class="text-center mb-5">

                <div class="section-label">
                    Fasilitas
                </div>

                <h2 class="section-title">
                    Fasilitas Pendukung Pembelajaran
                </h2>

                <p class="section-description mx-auto">
                    Kami menyediakan fasilitas yang mendukung proses
                    pembelajaran dan persiapan peserta sebelum berangkat
                    ke Jepang.
                </p>

            </div>

            <div class="facility-slider">

                @forelse($facilities as $facility)

                <div>

                    <div class="facility-card">

                        @if($facility->image)
                            <img
                                src="{{ asset('storage/' . $facility->image) }}"
                                alt="{{ $facility->name }}"
                                class="facility-img">
                        @else
                            <div class="facility-icon">
                                <i class="{{ $facility->icon ?? 'bi bi-building' }}"></i>
                            </div>
                        @endif

                        <h4>
                            {{ $facility->name }}
                        </h4>

                        <p>
                            {{ $facility->description }}
                        </p>

                    </div>

                </div>

                @empty

                <div class="col-12">

                    <div class="text-center">
                        <p class="text-muted">
                            Belum ada data fasilitas.
                        </p>
                    </div>

                </div>

                @endforelse

            </div>

        </div>

    </section>


    <!-- PROGRAM -->
    <section id="program">

        <div class="container">

            <div class="text-center mb-5">

                <div class="section-label">
                    Program Pelatihan
                </div>

                <h2 class="section-title">
                    Persiapkan Dirimu Sebelum ke Jepang
                </h2>

            </div>

            <div class="row g-4">

                @forelse($programs as $program)

                <div class="col-md-6 col-lg-4">

                    <div class="program-card"
                         data-bs-toggle="modal"
                         data-bs-target="#programModal"
                         data-name="{{ $program->name }}"
                         data-description="{{ $program->description }}"
                         data-image="{{ $program->image ? asset('storage/' . $program->image) : '' }}">

                        @if($program->image)

                        <img
                            src="{{ asset('storage/' . $program->image) }}"
                            alt="{{ $program->name }}">

                        @endif

                        <div class="program-content">

                            <h4>{{ $program->name }}</h4>

                            <p>{{ $program->description }}</p>

                            <button class="program-detail-btn" type="button">
                                Lihat Detail <i class="bi bi-arrow-right ms-1"></i>
                            </button>

                        </div>

                    </div>

                </div>

                @empty

                <div class="col-12 text-center">

                    <p class="text-muted">
                        Belum ada program pelatihan.
                    </p>

                </div>

                @endforelse

            </div>

        </div>

    </section>

    <!-- MODAL DETAIL PROGRAM -->
    <div class="modal fade modal-program" id="programModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                <div class="modal-body p-0">

                    <div id="programModalImg" class="d-none">
                        <img id="programModalImgEl" src="" alt="" style="width:100%; max-height:300px; object-fit:cover;">
                    </div>

                    <div class="p-4">

                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h4 id="programModalName" class="modal-title mb-0"></h4>
                            <button type="button" class="btn-close ms-3" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>

                        <div class="section-label mb-2">Program Pelatihan</div>

                        <p id="programModalDesc" class="modal-desc"></p>

                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- STATISTIC -->
    <section class="stats">

        <div class="container">

            <div class="row g-4">

                <div class="col-6 col-lg-3">

                    <div class="stat-item">

                        <div class="stat-number">
                            {{ $setting->students_count }}+
                        </div>

                        <div class="stat-label">
                            Peserta Dilatih
                        </div>

                    </div>

                </div>


                <div class="col-6 col-lg-3">

                    <div class="stat-item">

                        <div class="stat-number">
                            {{ $setting->graduates_count }}+
                        </div>

                        <div class="stat-label">
                            Lulusan
                        </div>

                    </div>

                </div>


                <div class="col-6 col-lg-3">

                    <div class="stat-item">

                        <div class="stat-number">
                            {{ $setting->japan_count }}+
                        </div>

                        <div class="stat-label">
                            Bekerja di Jepang
                        </div>

                    </div>

                </div>


                <div class="col-6 col-lg-3">

                    <div class="stat-item">

                        <div class="stat-number">
                            {{ $setting->experience_years }}+
                        </div>

                        <div class="stat-label">
                            Tahun Pengalaman
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- LULUSAN -->
    <section id="lulusan">

        <div class="container">

            <div class="text-center mb-5">

                <div class="section-label">
                    Lulusan Kami
                </div>

                <h2 class="section-title">
                    Mereka yang Telah Melangkah ke Jepang
                </h2>

                <p class="section-description mx-auto">
                    Kesuksesan alumni menjadi bagian dari perjalanan
                    kami dalam mencetak sumber daya manusia Indonesia
                    yang siap bekerja di Jepang.
                </p>

            </div>

            <div class="graduate-slider">

                @forelse($graduates as $graduate)

                <div>

                    <div class="graduate-card">

                        @if($graduate->photo)

                        <img
                            src="{{ asset('storage/' . $graduate->photo) }}"
                            alt="{{ $graduate->name }}">

                        @endif

                        <h5>
                            {{ $graduate->name }}
                        </h5>

                        <div class="graduate-position">
                            {{ $graduate->display_position }}
                        </div>

                        <p class="mt-3">
                            "{{ $graduate->description }}"
                        </p>

                    </div>

                </div>

                @empty

                <div class="col-12 text-center">

                    <p class="text-muted">
                        Belum ada data lulusan.
                    </p>

                </div>

                @endforelse

            </div>

        </div>

    </section>


    <!-- QnA -->
    <section id="qna" class="qna-section">

        <div class="container">

            <div class="text-center mb-5">

                <div class="section-label">
                    QnA
                </div>

                <h2 class="section-title">
                    Pertanyaan yang Sering Ditanyakan
                </h2>

                <p class="section-description mx-auto">
                    Temukan jawaban atas pertanyaan yang paling sering kami terima.
                </p>

            </div>

            @if($faqs->isEmpty())

                <p class="text-center text-muted">Belum ada pertanyaan.</p>

            @else

                <div class="accordion qna-accordion" id="faqAccordion">

                    @foreach($faqs as $faq)

                    <div class="accordion-item">

                        <h2 class="accordion-header" id="faqHeading{{ $faq->id }}">
                            <button class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faqCollapse{{ $faq->id }}"
                                    aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                    aria-controls="faqCollapse{{ $faq->id }}">
                                {{ $faq->question }}
                            </button>
                        </h2>

                        <div id="faqCollapse{{ $faq->id }}"
                             class="accordion-collapse collapse"
                             aria-labelledby="faqHeading{{ $faq->id }}"
                             data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {!! nl2br(e($faq->answer)) !!}
                            </div>
                        </div>

                    </div>

                    @endforeach

                </div>

            @endif

        </div>

    </section>


    <!-- CTA -->
    <section class="cta" id="kontak">

        <div class="container">

            <div class="cta-box">

                <h2>
                    Siap Memulai Perjalananmu?
                </h2>

                <p>
                    Bergabung bersama kami dan persiapkan dirimu
                    untuk mendapatkan pengalaman serta peluang
                    kerja di Jepang.
                </p>

                <a
                    href="{{ $setting->whatsapp_link }}"
                    target="_blank"
                    class="btn-white">
                    <i class="bi bi-whatsapp me-2"></i>
                    Konsultasi Sekarang
                </a>

            </div>

        </div>

    </section>


    <!-- FOOTER -->
    <footer>

        <div class="container">

            <div class="row g-5">

                <div class="col-lg-5">

                    <h5>
                        LPK KELAS JEPANG PANGANDARAN
                    </h5>

                    <p>
                        Lembaga pendidikan dan pelatihan kerja yang
                        membantu generasi muda Indonesia mempersiapkan
                        diri untuk bekerja dan berkarier di Jepang.
                    </p>

                </div>


                <div class="col-lg-3">

                    <h5>
                        Navigasi
                    </h5>

                    <ul>

                        <li>
                            <a href="#profil">Profil</a>
                        </li>

                        <li>
                            <a href="#visi-misi">Visi & Misi</a>
                        </li>

                        <li>
                            <a href="#fasilitas">Fasilitas</a>
                        </li>

                        <li>
                            <a href="#program">Program</a>
                        </li>

                        <li>
                            <a href="#lulusan">Lulusan</a>
                        </li>

                        <li>
                            <a href="#qna">QnA</a>
                        </li>

                    </ul>

                </div>


                <div class="col-lg-4">

                    <h5>
                        Kontak
                    </h5>

                    <ul>

                        <li>
                            <i class="bi bi-geo-alt me-2"></i>
                            {{ $setting->address ?? 'Alamat belum tersedia' }}
                        </li>

                        <li>
                            <i class="bi bi-whatsapp me-2"></i>
                            {{ $setting->phone ?? '-' }}
                        </li>

                        <li>
                            <i class="bi bi-envelope me-2"></i>
                            {{ $setting->email ?? '-' }}
                        </li>

                    </ul>

                </div>

            </div>


            <div class="footer-bottom text-center">

                © {{ date('Y') }} LPK Kelas Jepang Pangandaran.
                All Rights Reserved.

            </div>

        </div>

    </footer>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Isi modal program dengan data dari card yang diklik
        const programModal = document.getElementById('programModal');
        programModal.addEventListener('show.bs.modal', function (e) {
            const card    = e.relatedTarget;
            const name    = card.dataset.name;
            const desc    = card.dataset.description;
            const image   = card.dataset.image;

            document.getElementById('programModalName').textContent = name;
            document.getElementById('programModalDesc').textContent = desc;

            const imgWrapper = document.getElementById('programModalImg');
            const imgEl      = document.getElementById('programModalImgEl');

            if (image) {
                imgEl.src = image;
                imgEl.alt = name;
                imgWrapper.classList.remove('d-none');
            } else {
                imgWrapper.classList.add('d-none');
            }
        });
    </script>

</body>

</html>