<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Dashboard') - LPK Kelas Jepang Pangandaran</title>
    <link rel="icon" type="image/png" href="{{ asset('images/lpk-kelas-jepang-pangandaran.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6fa;
        }

        .sidebar {
            background-color: #212529;
            padding: 20px 16px;
        }

        @media (min-width: 768px) {
            .sidebar {
                position: sticky;
                top: 0;
                height: 100vh;
                overflow-y: auto;
                padding: 24px 16px;
            }
        }

        .sidebar a {
            display: block;
            color: #ddd;
            text-decoration: none;
            padding: 10px 12px;
            border-radius: 6px;
            margin-bottom: 6px;
            transition: background-color 0.15s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #343a40;
            color: white;
        }

        .main-content {
            padding: 28px;
        }

        @media (max-width: 767.98px) {
            .main-content {
                padding: 20px 16px;
            }
        }

        /* Quill editor */
        .ql-container {
            font-size: 15px;
            min-height: 120px;
            border-bottom-left-radius: 6px;
            border-bottom-right-radius: 6px;
        }

        .ql-toolbar {
            border-top-left-radius: 6px;
            border-top-right-radius: 6px;
            background: #f8f9fa;
        }

        .ql-editor {
            min-height: 120px;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">

        <aside class="col-md-2 sidebar">
            <div class="d-flex justify-content-between align-items-center mb-md-4">
                <a href="{{ url('/') }}" target="_blank" class="p-0 m-0 bg-transparent">
                    <img src="{{ asset('images/lpk-kelas-jepang-pangandaran.png') }}" alt="Logo LPK"
                         style="height:48px;width:auto;object-fit:contain;display:block;filter:brightness(0) invert(1)">
                </a>
                <button class="btn btn-outline-light btn-sm d-md-none" type="button"
                        data-bs-toggle="collapse" data-bs-target="#adminSidebarMenu"
                        aria-controls="adminSidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list fs-5"></i>
                </button>
            </div>

            <div class="collapse d-md-block mt-3 mt-md-0" id="adminSidebarMenu">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i>Dashboard
                </a>
                <a href="{{ route('admin.settings.edit') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <i class="bi bi-gear me-2"></i>Pengaturan
                </a>
                <a href="{{ route('admin.facilities.index') }}" class="{{ request()->routeIs('admin.facilities.*') ? 'active' : '' }}">
                    <i class="bi bi-building me-2"></i>Fasilitas
                </a>
                <a href="{{ route('admin.programs.index') }}" class="{{ request()->routeIs('admin.programs.*') ? 'active' : '' }}">
                    <i class="bi bi-signpost-split me-2"></i>Alur Pendaftaran
                </a>
                <a href="{{ route('admin.graduates.index') }}" class="{{ request()->routeIs('admin.graduates.*') ? 'active' : '' }}">
                    <i class="bi bi-mortarboard me-2"></i>Lulusan
                </a>
                <a href="{{ route('admin.graduate-stats.index') }}" class="{{ request()->routeIs('admin.graduate-stats.*') ? 'active' : '' }}">
                    <i class="bi bi-bar-chart me-2"></i>Statistik Lulusan
                </a>
                <a href="{{ route('admin.faqs.index') }}" class="{{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                    <i class="bi bi-question-circle me-2"></i>QnA
                </a>
                <a href="{{ route('admin.galleries.index') }}" class="{{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                    <i class="bi bi-images me-2"></i>Galeri
                </a>
                <a href="{{ route('admin.activity-logs.index') }}" class="{{ request()->routeIs('admin.activity-logs.*') ? 'active' : '' }}">
                    <i class="bi bi-clock-history me-2"></i>Log Aktivitas
                </a>

                @if(auth()->user()->isSuperAdmin())
                <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <i class="bi bi-people me-2"></i>Manajemen User
                </a>
                @endif

                <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.*') ? 'active' : '' }}">
                    <i class="bi bi-person-circle me-2"></i>Profil Akun
                </a>

                <form action="{{ route('logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm w-100">
                        <i class="bi bi-box-arrow-right me-1"></i>Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="col-md-10 main-content">
            @yield('content')
        </main>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

@stack('scripts')
</body>
</html>
