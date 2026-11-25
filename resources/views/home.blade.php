@extends('layouts.app')

@section('content')
<!-- Hero Banner Dashboard -->
<div class="card mb-4 overflow-hidden" style="background: linear-gradient(135deg, #1b4332 0%, #2d6a4f 65%, #40916c 100%); color: #ffffff;">
    <div class="card-body p-4 p-md-5 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
        <div>
            <span class="badge bg-warning text-dark mb-2 px-3 py-1 rounded-pill fw-semibold">
                <i class="bi bi-stars me-1"></i> Sistem Kasir & Manajemen Kedai
            </span>
            <h2 class="fw-bold mb-1" style="font-family: 'Playfair Display', serif;">
                Selamat Datang di Green Haven Cafe
            </h2>
            <p class="mb-0 text-white-50">
                Halo, <strong class="text-white">{{ Auth::user()->name }}</strong> &mdash; Anda login sebagai
                <span class="text-warning fw-semibold">{{ ucfirst(Auth::user()->role) }}</span>.
            </p>
        </div>
        <div>
            <a href="{{ route('pesanans.create') }}" class="btn btn-warning btn-lg fw-semibold px-4 shadow-sm rounded-3">
                <i class="bi bi-plus-circle me-1"></i> Catat Pesanan Baru
            </a>
        </div>
    </div>
</div>

<!-- Kartu Statistik -->
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card h-100">
            <div class="card-body d-flex align-items-center gap-3 p-4">
                <div class="icon-box bg-success bg-opacity-10 text-success">
                    <i class="bi bi-tags-fill"></i>
                </div>
                <div>
                    <div class="text-muted small fw-medium">Total Kategori</div>
                    <h3 class="fw-bold mb-0">{{ $totalKategori }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card h-100">
            <div class="card-body d-flex align-items-center gap-3 p-4">
                <div class="icon-box bg-primary bg-opacity-10 text-primary">
                    <i class="bi bi-cup-hot-fill"></i>
                </div>
                <div>
                    <div class="text-muted small fw-medium">Total Menu</div>
                    <h3 class="fw-bold mb-0">{{ $totalMenu }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card h-100">
            <div class="card-body d-flex align-items-center gap-3 p-4">
                <div class="icon-box bg-warning bg-opacity-25 text-warning">
                    <i class="bi bi-hourglass-split"></i>
                </div>
                <div>
                    <div class="text-muted small fw-medium">Pesanan Diproses</div>
                    <h3 class="fw-bold mb-0">{{ $pesananDiproses }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card h-100">
            <div class="card-body d-flex align-items-center gap-3 p-4">
                <div class="icon-box bg-dark bg-opacity-10 text-dark">
                    <i class="bi bi-cash-stack"></i>
                </div>
                <div>
                    <div class="text-muted small fw-medium">Total Pendapatan</div>
                    <h4 class="fw-bold mb-0 text-success">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Menu Akses Cepat -->
<div class="card">
    <div class="card-body p-4">
        <h6 class="fw-bold text-uppercase text-muted small mb-3">Akses Cepat Operasional</h6>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('pesanans.index') }}" class="btn btn-primary px-3 py-2">
                <i class="bi bi-receipt me-1"></i> Daftar Pesanan Pelanggan
            </a>
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('menus.index') }}" class="btn btn-outline-success px-3 py-2">
                    <i class="bi bi-cup-straw me-1"></i> Kelola Daftar Menu
                </a>
                <a href="{{ route('kategoris.index') }}" class="btn btn-outline-secondary px-3 py-2">
                    <i class="bi bi-tags me-1"></i> Kelola Kategori
                </a>
                <a href="{{ route('users.index') }}" class="btn btn-outline-dark px-3 py-2">
                    <i class="bi bi-person-plus me-1"></i> Kelola Akun Pegawai
                </a>
            @endif
        </div>
    </div>
</div>
@endsection