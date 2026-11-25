<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Green Haven Cafe') }}</title>

    <!-- Google Fonts & Bootstrap Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        :root {
            --cafe-dark: #1b4332;
            --cafe-primary: #2d6a4f;
            --cafe-accent: #d4a373;
            --cafe-bg: #f6f4ef;
            --cafe-surface: #ffffff;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--cafe-bg);
            color: #2b2d42;
        }

        .navbar-cafe {
            background: linear-gradient(135deg, var(--cafe-dark) 0%, var(--cafe-primary) 100%);
            padding-top: 0.85rem;
            padding-bottom: 0.85rem;
        }

        .navbar-brand-cafe {
            font-family: 'Playfair Display', serif;
            font-size: 1.35rem;
            letter-spacing: 0.3px;
        }

        .nav-link-cafe {
            color: rgba(255, 255, 255, 0.82) !important;
            font-weight: 500;
            padding: 0.45rem 0.9rem !important;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .nav-link-cafe:hover,
        .nav-link-cafe.active {
            color: #ffffff !important;
            background-color: rgba(255, 255, 255, 0.14);
        }

        .card {
            border: none !important;
            border-radius: 16px !important;
            box-shadow: 0 4px 20px rgba(27, 67, 50, 0.06) !important;
        }

        .card-header {
            background: linear-gradient(135deg, var(--cafe-dark), var(--cafe-primary)) !important;
            border-top-left-radius: 16px !important;
            border-top-right-radius: 16px !important;
            padding: 1rem 1.25rem;
        }

        .table thead th {
            background-color: var(--cafe-dark) !important;
            color: #ffffff;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            border: none;
            padding: 0.85rem 1rem;
        }

        .table tbody td {
            padding: 0.85rem 1rem;
            border-color: #efede8;
        }

        .btn-primary {
            background-color: var(--cafe-primary) !important;
            border-color: var(--cafe-primary) !important;
            border-radius: 10px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: var(--cafe-dark) !important;
            border-color: var(--cafe-dark) !important;
        }

        .btn-sm {
            border-radius: 8px;
            font-weight: 500;
        }

        .form-control, .form-select {
            border-radius: 10px;
            border-color: #dcd8cf;
            padding: 0.6rem 0.9rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--cafe-primary);
            box-shadow: 0 0 0 0.2rem rgba(45, 106, 79, 0.18);
        }

        .stat-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(27, 67, 50, 0.12) !important;
        }

        .icon-box {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark navbar-cafe shadow-sm">
            <div class="container">
                <a class="navbar-brand navbar-brand-cafe fw-bold d-flex align-items-center gap-2" href="{{ url('/home') }}">
                    <i class="bi bi-cup-hot-fill text-warning"></i>
                    <span>Green Haven Cafe</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Menu Navigasi Kiri -->
                    <ul class="navbar-nav me-auto ms-lg-3 gap-1">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link nav-link-cafe {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                                    <i class="bi bi-grid-1x2 me-1"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-cafe {{ request()->routeIs('pesanans.*') ? 'active' : '' }}" href="{{ route('pesanans.index') }}">
                                    <i class="bi bi-receipt-cutoff me-1"></i> Pesanan
                                </a>
                            </li>
                            @if(Auth::user()->role === 'admin')
                                <li class="nav-item">
                                    <a class="nav-link nav-link-cafe {{ request()->routeIs('kategoris.*') ? 'active' : '' }}" href="{{ route('kategoris.index') }}">
                                        <i class="bi bi-tags me-1"></i> Kategori
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-link-cafe {{ request()->routeIs('menus.*') ? 'active' : '' }}" href="{{ route('menus.index') }}">
                                        <i class="bi bi-cup-straw me-1"></i> Menu
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-link-cafe {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                                        <i class="bi bi-people me-1"></i> Kelola Akun
                                    </a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                            <li class="nav-item me-2">
                                <div class="d-flex align-items-center bg-white bg-opacity-10 px-3 py-1 rounded-pill text-white small">
                                    <i class="bi bi-person-circle me-2"></i>
                                    <span class="fw-semibold">{{ Auth::user()->name }}</span>
                                    <span class="badge bg-warning text-dark text-uppercase ms-2" style="font-size: 0.68rem;">
                                        {{ Auth::user()->role }}
                                    </span>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('password.edit') }}" class="btn btn-outline-light btn-sm">
                                    <i class="bi bi-key me-1"></i> Ganti Password
                                </a>
                            </li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                                    </button>
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>