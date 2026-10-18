
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Dashboard') - LPK Kelas Jepang Pangandaran</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6fa;
        }

        .sidebar {
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            background-color: #212529;
            padding: 24px 16px;
        }

        .sidebar a {
            display: block;
            color: #ddd;
            text-decoration: none;
            padding: 10px 12px;
            border-radius: 6px;
            margin-bottom: 6px;
        }

        .sidebar a:hover {
            background-color: #343a40;
            color: white;
        }

        .main-content {
            padding: 28px;
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
            <h5 class="text-white mb-4">LPK Kelas Jepang Pangandaran</h5>

            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.settings.edit') }}">Pengaturan</a>
            <a href="{{ route('admin.facilities.index') }}">Fasilitas</a>
            <a href="{{ route('admin.programs.index') }}">Alur Pendaftaran</a>
            <a href="{{ route('admin.graduates.index') }}">Lulusan</a>
            <a href="{{ route('admin.graduate-stats.index') }}">Statistik Lulusan</a>
            <a href="{{ route('admin.faqs.index') }}">QnA</a>
            <a href="{{ route('admin.galleries.index') }}">Galeri</a>
            <a href="{{ route('admin.activity-logs.index') }}">Log Aktivitas</a>

            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm w-100">
                    Logout
                </button>
            </form>
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
```
