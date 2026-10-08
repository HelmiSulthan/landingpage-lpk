```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Dashboard') - LPK Sakura Indonesia</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background-color: #f5f6fa;
        }

        .sidebar {
            min-height: 100vh;
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
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">

        <aside class="col-md-2 sidebar">
            <h5 class="text-white mb-4">LPK Sakura</h5>

            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.settings.edit') }}">Pengaturan</a>
            <a href="{{ route('admin.facilities.index') }}">Fasilitas</a>
            <a href="{{ route('admin.programs.index') }}">Program</a>
            <a href="{{ route('admin.graduates.index') }}">Lulusan</a>

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
</body>
</html>
```
