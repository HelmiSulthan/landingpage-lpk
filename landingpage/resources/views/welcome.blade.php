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
        }

        .hero-slide {
            position: absolute;
            inset: 0;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center right;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }

        .hero-slide.active {
            opacity: 1;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(255, 255, 255, .98) 0%, rgba(255, 255, 255, .92) 48%, rgba(255, 255, 255, .25) 100%);
            z-index: 1;
        }

        .hero .container {
            position: relative;
            z-index: 2;
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
            max-width: 400px;
            height: auto;
            border-radius: 20px;
            display: block;
            margin: 0 auto;
        }

        .profile-text {
            line-height: 1.9;
            color: #64748b;
            overflow-wrap: break-word;
            word-break: break-word;
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

        /* CSS counter untuk misi dari Quill */
        .mission-rendered {
            counter-reset: mission-counter;
        }

        .mission-rendered p,
        .mission-rendered li {
            counter-increment: mission-counter;
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-bottom: 18px;
            color: #374151;
            line-height: 1.7;
            list-style: none;
        }

        .mission-rendered p::before,
        .mission-rendered li::before {
            content: counter(mission-counter, decimal-leading-zero);
            min-width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #fee2e2;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 14px;
            flex-shrink: 0;
        }

        .mission-rendered ol,
        .mission-rendered ul {
            padding: 0;
            margin: 0;
        }

        /* Override warna counter di vision-card (background merah) */
        .vision-rendered p::before,
        .vision-rendered li::before {
            background: rgba(255, 255, 255, .2);
            color: white;
        }

        .vision-rendered p,
        .vision-rendered li {
            color: rgba(255, 255, 255, .95);
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
            display: flex;
            flex-direction: column;
            cursor: pointer;
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
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex: 1;
        }

        .facility-detail-btn {
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

        .facility-detail-btn:hover {
            background: var(--primary);
            color: white;
        }

        /* ALUR PENDAFTARAN */
        .alur-card {
            position: relative;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 28px 24px 24px;
            height: 100%;
            transition: .3s;
            display: flex;
            flex-direction: column;
        }

        .alur-card:hover {
            box-shadow: 0 12px 30px rgba(0,0,0,.08);
            transform: translateY(-4px);
        }

        .alur-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            font-weight: 800;
            font-size: 16px;
            margin-bottom: 16px;
            flex-shrink: 0;
        }

        .alur-card h4 {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark);
        }

        .alur-card p {
            color: var(--gray);
            font-size: 14px;
            line-height: 1.75;
            margin: 0;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex: 1;
        }

        .alur-detail-btn {
            margin-top: 14px;
            font-size: 13px;
            font-weight: 600;
            color: var(--primary);
            background: #fee2e2;
            border: none;
            padding: 6px 14px;
            border-radius: 8px;
            cursor: pointer;
            align-self: flex-start;
            transition: .2s;
        }

        .alur-detail-btn:hover {
            background: var(--primary);
            color: white;
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

        /* GALLERY */
        .gallery-section {
            background: #f8fafc;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .gallery-item {
            position: relative;
            border-radius: 14px;
            overflow: hidden;
            cursor: pointer;
            aspect-ratio: 4/3;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: .4s;
        }

        .gallery-item:hover img {
            transform: scale(1.08);
        }

        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,.85) 0%, rgba(0,0,0,.2) 60%, transparent 100%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 20px;
            opacity: 0;
            transition: .3s;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-overlay h5 {
            color: white;
            font-weight: 700;
            font-size: 16px;
            margin-bottom: 4px;
        }

        .gallery-overlay p {
            color: rgba(255,255,255,.8);
            font-size: 13px;
            margin: 0;
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

        /* SCROLL FADE IN */
        .fade-in-section {
            opacity: 0;
            transform: translateY(36px);
            transition: opacity .7s ease, transform .7s ease;
        }

        .fade-in-section.is-visible {
            opacity: 1;
            transform: translateY(0);
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
            }

            .hero-overlay {
                background: linear-gradient(rgba(255, 255, 255, .93), rgba(255, 255, 255, .93));
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
            scroll-snap-type: none;
            -webkit-overflow-scrolling: touch;
        }

        .slider-wrapper {
            position: relative;
        }

        .slider-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-60%);
            z-index: 10;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: none;
            background: white;
            box-shadow: 0 4px 14px rgba(0,0,0,.12);
            color: var(--dark);
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: .2s;
        }

        .slider-btn:hover {
            background: var(--primary);
            color: white;
        }

        .slider-btn.prev { left: -20px; }
        .slider-btn.next { right: -20px; }

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
                        <a class="nav-link" href="#program">Alur Pendaftaran</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#lulusan">Lulusan</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#qna">QnA</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#galeri">Galeri</a>
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

        @php
            $heroSlides = $heroImages->isEmpty()
                ? ['https://images.unsplash.com/photo-1528360983277-13d401cdc186?auto=format&fit=crop&w=1800&q=80']
                : $heroImages->map(fn($img) => asset('storage/' . $img->image))->toArray();
        @endphp

        @foreach($heroSlides as $slide)
        <div class="hero-slide {{ $loop->first ? 'active' : '' }}" style="background-image: url('{{ $slide }}')"></div>
        @endforeach

        <div class="hero-overlay"></div>

        <div class="container">

            <div class="hero-content">

                <div class="badge-japan">
                    🇯🇵 Pelatihan & Penyaluran Kerja ke Jepang
                </div>

                <h1>
                    {{ $setting->hero_title ?? 'Pelatihan Kerja ke Jepang' }}
                </h1>

                <p>
                    {!! \App\Models\Setting::cleanHtml($setting->hero_description) ?: 'Mempersiapkan generasi muda Indonesia untuk bekerja di Jepang.' !!}
                </p>

                <div class="hero-buttons">

                    <a href="#program" class="btn-primary-custom">
                        Lihat Alur Pendaftaran
                    </a>

                    <a href="#profil" class="btn-outline-custom">
                        Tentang Kami
                    </a>

                </div>

            </div>

        </div>

    </section>


    <!-- PROFIL -->
    <section id="profil" class="fade-in-section">

        <div class="container">

            <div class="row align-items-center g-5">

                <div class="col-lg-6">

                    @if($setting->leader_photo)
                        <img
                            src="{{ asset('storage/' . $setting->leader_photo) }}"
                            class="profile-image"
                            alt="{{ $setting->leader_name ?? 'Atasan LPK' }}">
                        @if($setting->leader_name)
                        <div class="text-center mt-3">
                            <div class="fw-bold fs-5">{{ $setting->leader_name }}</div>
                            @if($setting->leader_position)
                            <div style="color:var(--primary);font-weight:600;font-size:14px">{{ $setting->leader_position }}</div>
                            @endif
                        </div>
                        @endif
                    @else
                        <img
                            src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1000&q=80"
                            class="profile-image"
                            alt="Pelatihan Siswa">
                    @endif

                </div>

                <div class="col-lg-6">

                    <div class="section-label">
                        KELAS JEPANG PANGANDARAN
                    </div>

                    <h2 class="section-title">
                        Membentuk SDM Indonesia yang Siap Bersaing
                    </h2>

                    <div class="profile-text">
                        {!! str_replace('&nbsp;', ' ', $setting->profile ?? 'Profil lembaga belum tersedia.') !!}
                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- VISI MISI -->
    <section id="visi-misi" class="bg-light fade-in-section">

        <div class="container">

            <div class="text-center mb-5">

                <div class="section-label">
                    Visi & Misi
                </div>

                <h2 class="section-title">
                    Komitmen Kami
                </h2>
            </div>

            <div class="row g-4">

                <!-- VISI -->
                <div class="col-lg-5">

                    <div class="vision-card">

                        <h3>
                            <i class="bi bi-eye me-2"></i>
                            Visi
                        </h3>

                        <div class="mission-rendered vision-rendered">
                            {!! \App\Models\Setting::cleanHtml($setting->vision) ?: '<p>Visi belum tersedia.</p>' !!}
                        </div>

                    </div>

                </div>

                <!-- MISI -->
                <div class="col-lg-7">

                    <div class="mission-card">

                        <h3 class="fw-bold mb-4">
                            Misi
                        </h3>

                        <div class="mission-rendered">
                            {!! \App\Models\Setting::cleanHtml($setting->mission) ?: '<p class="text-muted">Misi belum tersedia.</p>' !!}
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- FASILITAS -->
    <section id="fasilitas" class="facility-section fade-in-section">

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

            <div class="slider-wrapper">
                <button class="slider-btn prev" data-target="facilitySlider">
                    <i class="bi bi-chevron-left"></i>
                </button>

                <div class="facility-slider" id="facilitySlider">

                @forelse($facilities as $facility)

                <div>

                    <div class="facility-card"
                         data-bs-toggle="modal"
                         data-bs-target="#facilityModal"
                         data-name="{{ $facility->name }}"
                         data-description="{{ $facility->description }}"
                         data-icon="{{ $facility->icon ?? 'bi bi-building' }}"
                         data-image="{{ $facility->image ? asset('storage/' . $facility->image) : '' }}">

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

                        <h4>{{ $facility->name }}</h4>

                        <p>{{ strip_tags($facility->description) }}</p>

                        <button class="facility-detail-btn" type="button">
                            Lihat Detail <i class="bi bi-arrow-right ms-1"></i>
                        </button>

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

                <button class="slider-btn next" data-target="facilitySlider">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>

        </div>

    </section>


    <!-- MODAL DETAIL FASILITAS -->
    <div class="modal fade modal-program" id="facilityModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                <div class="modal-body p-0">

                    <div id="facilityModalImg" class="d-none">
                        <img id="facilityModalImgEl" src="" alt="" style="width:100%; max-height:300px; object-fit:cover;">
                    </div>

                    <div class="p-4">

                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <div id="facilityModalIcon" class="facility-icon mb-0" style="flex-shrink:0;margin-bottom:0!important"></div>
                                <h4 id="facilityModalName" class="modal-title mb-0"></h4>
                            </div>
                            <button type="button" class="btn-close ms-3" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>

                        <div class="section-label mb-2">Fasilitas</div>

                        <p id="facilityModalDesc" class="modal-desc" style="color:var(--gray);line-height:1.8;white-space:pre-line"></p>

                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- ALUR PENDAFTARAN -->
    <section id="program" class="fade-in-section">

        <div class="container">

            <div class="text-center mb-5">

                <div class="section-label">
                    Alur Pendaftaran
                </div>

                <h2 class="section-title">
                    Langkah-Langkah Bergabung
                </h2>

            </div>

            <div class="row g-4">

                @forelse($programs as $index => $program)

                <div class="col-md-6 col-lg-3">

                    <div class="alur-card"
                         data-bs-toggle="modal"
                         data-bs-target="#alurModal"
                         data-nomor="{{ $loop->iteration }}"
                         data-name="{{ $program->name }}"
                         data-description="{{ \App\Models\Setting::cleanHtml($program->description) }}">

                        <div class="alur-number">{{ $loop->iteration }}</div>

                        <h4>{{ $program->name }}</h4>

                        <p>{{ strip_tags(str_replace('&nbsp;', ' ', $program->description)) }}</p>

                        <button class="alur-detail-btn" type="button">
                            Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                        </button>

                    </div>

                </div>

                @empty

                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada alur pendaftaran.</p>
                </div>

                @endforelse

            </div>

        </div>

    </section>

    <!-- MODAL DETAIL ALUR PENDAFTARAN -->
    <div class="modal fade" id="alurModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                <div class="modal-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="alur-number mb-0" id="alurModalNomor" style="margin-bottom:0!important"></div>
                            <h5 id="alurModalName" class="fw-bold mb-0"></h5>
                        </div>
                        <button type="button" class="btn-close ms-2" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="section-label mb-2">Alur Pendaftaran</div>
                    <div id="alurModalDesc" style="color:var(--gray);line-height:1.8;font-size:15px"></div>
                </div>
            </div>
        </div>
    </div>


    <!-- STATISTIC -->
    <section class="stats fade-in-section">

        <div class="container">

            <div class="row g-4">

                <div class="col-6 col-lg-3">

                    <div class="stat-item">

                        <div class="stat-number" data-target="{{ (int)($setting->students_count ?? 0) }}">
                            0+
                        </div>

                        <div class="stat-label">
                            Peserta Dilatih
                        </div>

                    </div>

                </div>


                <div class="col-6 col-lg-3">

                    <div class="stat-item">

                        <div class="stat-number" data-target="{{ (int)($setting->graduates_count ?? 0) }}">
                            0+
                        </div>

                        <div class="stat-label">
                            Lulusan
                        </div>

                    </div>

                </div>


                <div class="col-6 col-lg-3">

                    <div class="stat-item">

                        <div class="stat-number" data-target="{{ (int)($setting->japan_count ?? 0) }}">
                            0+
                        </div>

                        <div class="stat-label">
                            Bekerja di Jepang
                        </div>

                    </div>

                </div>


                <div class="col-6 col-lg-3">

                    <div class="stat-item">

                        <div class="stat-number" data-target="{{ (int)($setting->experience_years ?? 0) }}">
                            0+
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
    <section id="lulusan" class="fade-in-section">

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

                @if($setting->graduates_gdrive_link)
                <a href="{{ $setting->graduates_gdrive_link }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="btn-primary-custom mt-3 d-inline-block">
                    <i class="bi bi-google me-2"></i>Selengkapnya
                </a>
                @endif

            </div>

            <div class="slider-wrapper">
                <button class="slider-btn prev" data-target="graduateSlider">
                    <i class="bi bi-chevron-left"></i>
                </button>

                <div class="graduate-slider" id="graduateSlider">

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
                            {!! $graduate->description !!}
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

                <button class="slider-btn next" data-target="graduateSlider">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>

        </div>

    </section>


    <!-- STATISTIK LULUSAN -->
    @if($graduateStats->isNotEmpty())
    <section class="fade-in-section" style="background:#f8fafc">

        <div class="container">

            <div class="text-center mb-5">
                <div class="section-label">Data Lulusan</div>
                <h2 class="section-title">Statistik Lulusan Kami</h2>
            </div>

            <div class="row g-4 justify-content-center">

                @foreach($graduateStats as $category => $items)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm" style="border-radius:16px;overflow:hidden">
                        <div class="card-header fw-bold text-white text-center py-3"
                             style="background:var(--primary);font-size:16px">
                            {{ $category }}
                        </div>
                        <div class="card-body p-0">
                            @foreach($items as $i => $item)
                            <div class="d-flex justify-content-between align-items-center px-4 py-3
                                        {{ $i % 2 === 0 ? '' : 'bg-light' }}">
                                <span style="color:#374151;font-weight:500">{{ $item->label }}</span>
                                <span class="fw-bold" style="color:var(--primary)">
                                    {{ number_format($item->total) }}
                                    <small class="text-muted fw-normal">orang</small>
                                </span>
                            </div>
                            @endforeach
                            <div class="d-flex justify-content-between align-items-center px-4 py-3 border-top">
                                <span class="fw-bold">Total</span>
                                <span class="fw-bold" style="color:var(--primary)">
                                    {{ number_format($items->sum('total')) }}
                                    <small class="text-muted fw-normal">orang</small>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>

    </section>
    @endif


    <!-- QnA -->
    <section id="qna" class="qna-section fade-in-section">

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
                                {!! $faq->answer !!}
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


    <!-- GALERI -->
    <section id="galeri" class="gallery-section fade-in-section">

        <div class="container">

            <div class="text-center mb-5">

                <div class="section-label">
                    Galeri
                </div>

                <h2 class="section-title">
                    Dokumentasi Kegiatan
                </h2>

                <p class="section-description mx-auto">
                    Momen-momen kegiatan pembelajaran dan persiapan peserta kami.
                </p>

            </div>

            @if($galleries->isEmpty())

                <p class="text-center text-muted">Belum ada dokumentasi.</p>

            @else

                <div class="gallery-grid">

                    @foreach($galleries as $gallery)

                    <div class="gallery-item"
                         data-bs-toggle="modal"
                         data-bs-target="#galleryModal"
                         data-title="{{ $gallery->title }}"
                         data-description="{{ $gallery->description ?? '' }}"
                         data-image="{{ asset('storage/' . $gallery->image) }}">

                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}">

                        <div class="gallery-overlay">
                            <h5>{{ $gallery->title }}</h5>
                            @if($gallery->description)
                            <p>{{ \Illuminate\Support\Str::limit($gallery->description, 60) }}</p>
                            @endif
                        </div>

                    </div>

                    @endforeach

                </div>

            @endif

        </div>

    </section>

    <!-- MODAL DETAIL GALERI -->
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                <div class="modal-body p-0">
                    <div class="position-relative">
                        <img id="galleryModalImg" src="" alt="" style="width:100%; max-height:400px; object-fit:cover;">
                        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="p-4">
                        <h4 id="galleryModalTitle" class="fw-bold mb-2"></h4>
                        <p id="galleryModalDesc" class="text-muted mb-0" style="line-height: 1.8;"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
                            <a href="#program">Alur Pendaftaran</a>
                        </li>

                        <li>
                            <a href="#lulusan">Lulusan</a>
                        </li>

                        <li>
                            <a href="#qna">QnA</a>
                        </li>

                        <li>
                            <a href="#galeri">Galeri</a>
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

                    @if($setting->instagram || $setting->tiktok)
                    <div class="d-flex gap-3 mt-3">

                        @if($setting->instagram)
                        <a href="{{ $setting->instagram }}" target="_blank" rel="noopener noreferrer"
                           style="width:38px;height:38px;border-radius:50%;background:rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;color:white;font-size:18px;transition:.2s"
                           onmouseover="this.style.background='#E1306C'"
                           onmouseout="this.style.background='rgba(255,255,255,.1)'">
                            <i class="bi bi-instagram"></i>
                        </a>
                        @endif

                        @if($setting->tiktok)
                        <a href="{{ $setting->tiktok }}" target="_blank" rel="noopener noreferrer"
                           style="width:38px;height:38px;border-radius:50%;background:rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;color:white;font-size:18px;transition:.2s"
                           onmouseover="this.style.background='#010101'"
                           onmouseout="this.style.background='rgba(255,255,255,.1)'">
                            <i class="bi bi-tiktok"></i>
                        </a>
                        @endif

                    </div>
                    @endif

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
        // ── FADE IN ON SCROLL ────────────────────────────────────────────
        const fadeObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    fadeObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });

        document.querySelectorAll('.fade-in-section').forEach(el => fadeObserver.observe(el));

        // ── COUNTER ANIMASI STATISTIK ─────────────────────────────────────
        function animateCounter(el, target, duration) {
            const start     = performance.now();
            const easeOut   = t => 1 - Math.pow(1 - t, 3); // cubic ease-out

            function step(now) {
                const elapsed  = now - start;
                const progress = Math.min(elapsed / duration, 1);
                const value    = Math.round(easeOut(progress) * target);
                el.textContent = value.toLocaleString('id-ID') + '+';
                if (progress < 1) requestAnimationFrame(step);
            }
            requestAnimationFrame(step);
        }

        const statsSection  = document.querySelector('.stats');
        let statsAnimated   = false;

        const statsObserver = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting && !statsAnimated) {
                statsAnimated = true;
                document.querySelectorAll('.stat-number[data-target]').forEach(el => {
                    const target = parseInt(el.dataset.target, 10) || 0;
                    animateCounter(el, target, 1000);
                });
            }
        }, { threshold: 0.3 });

        if (statsSection) statsObserver.observe(statsSection);

        // ── SLIDER FASILITAS & LULUSAN ─────────────────────────────────────
        function setupSlider(sliderId) {
            const slider = document.getElementById(sliderId);
            if (!slider) return;

            const wrapper = slider.closest('.slider-wrapper');
            const prevBtn = wrapper.querySelector('.prev');
            const nextBtn = wrapper.querySelector('.next');

            // Kecepatan piksel per frame (lebih kecil = lebih lambat)
            const speed   = 0.5;
            let paused    = false;
            let rafId     = null;

            function tick() {
                if (!paused) {
                    const maxScroll = slider.scrollWidth - slider.clientWidth;
                    if (slider.scrollLeft >= maxScroll - 1) {
                        // Balik ke awal secara instan lalu lanjut mengalir
                        slider.scrollLeft = 0;
                    } else {
                        slider.scrollLeft += speed;
                    }
                }
                rafId = requestAnimationFrame(tick);
            }

            rafId = requestAnimationFrame(tick);

            // Pause saat hover atau touch
            slider.addEventListener('mouseenter', () => paused = true);
            slider.addEventListener('mouseleave', () => paused = false);
            slider.addEventListener('touchstart',  () => paused = true,  { passive: true });
            slider.addEventListener('touchend',    () => paused = false, { passive: true });

            // Tombol prev / next geser satu item
            const itemWidth = () => (slider.firstElementChild?.offsetWidth ?? 300) + 24;
            prevBtn?.addEventListener('click', () => {
                paused = true;
                slider.scrollBy({ left: -itemWidth(), behavior: 'smooth' });
                setTimeout(() => paused = false, 600);
            });
            nextBtn?.addEventListener('click', () => {
                paused = true;
                slider.scrollBy({ left: itemWidth(), behavior: 'smooth' });
                setTimeout(() => paused = false, 600);
            });
        }

        setupSlider('facilitySlider');
        setupSlider('graduateSlider');

        // ── SLIDESHOW HERO BACKGROUND ─────────────────────────────────────
        const heroSlides = document.querySelectorAll('.hero-slide');
        if (heroSlides.length > 1) {
            let current = 0;
            setInterval(() => {
                heroSlides[current].classList.remove('active');
                current = (current + 1) % heroSlides.length;
                heroSlides[current].classList.add('active');
            }, 5000);
        }

        // Isi modal fasilitas dengan data dari card yang diklik
        const facilityModal = document.getElementById('facilityModal');
        facilityModal.addEventListener('show.bs.modal', function (e) {
            const card  = e.relatedTarget;
            const name  = card.dataset.name;
            const desc  = card.dataset.description;
            const icon  = card.dataset.icon;
            const image = card.dataset.image;

            document.getElementById('facilityModalName').textContent = name;
            document.getElementById('facilityModalDesc').innerHTML = desc;

            // icon
            const iconEl = document.getElementById('facilityModalIcon');
            iconEl.innerHTML = `<i class="${icon}" style="font-size:26px"></i>`;

            // gambar
            const imgWrapper = document.getElementById('facilityModalImg');
            const imgEl      = document.getElementById('facilityModalImgEl');
            if (image) {
                imgEl.src = image;
                imgEl.alt = name;
                imgWrapper.classList.remove('d-none');
                iconEl.style.display = 'none';
            } else {
                imgWrapper.classList.add('d-none');
                iconEl.style.display = 'flex';
            }
        });

        // Isi modal alur pendaftaran
        const alurModal = document.getElementById('alurModal');
        alurModal?.addEventListener('show.bs.modal', function (e) {
            const card = e.relatedTarget;
            document.getElementById('alurModalNomor').textContent = card.dataset.nomor;
            document.getElementById('alurModalName').textContent  = card.dataset.name;
            document.getElementById('alurModalDesc').innerHTML    = card.dataset.description;
        });

        // Isi modal galeri dengan data dari item yang diklik
        const galleryModal = document.getElementById('galleryModal');
        galleryModal.addEventListener('show.bs.modal', function (e) {
            const item  = e.relatedTarget;
            const title = item.dataset.title;
            const desc  = item.dataset.description;
            const image = item.dataset.image;

            document.getElementById('galleryModalTitle').textContent = title;
            document.getElementById('galleryModalDesc').textContent  = desc;
            document.getElementById('galleryModalImg').src           = image;
            document.getElementById('galleryModalImg').alt           = title;
        });
    </script>

</body>

</html>