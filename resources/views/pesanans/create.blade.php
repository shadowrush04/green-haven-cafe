@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-bold">Catat Pesanan Pelanggan</div>
            <div class="card-body">
                <form action="{{ route('pesanans.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" class="form-control @error('nama_pelanggan') is-invalid @enderror" value="{{ old('nama_pelanggan') }}" required>
                        @error('nama_pelanggan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor Meja (1 - 50)</label>
                        <input type="number" name="nomor_meja" class="form-control @error('nomor_meja') is-invalid @enderror" value="{{ old('nomor_meja') }}" min="1" max="50" required>
                        @error('nomor_meja')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pilih Menu (Hanya yang Tersedia)</label>
                        <select name="menu_id" class="form-select @error('menu_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Menu --</option>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}" {{ old('menu_id') == $menu->id ? 'selected' : '' }}>
                                    {{ $menu->nama_menu }} - Rp {{ number_format($menu->harga, 0, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                        @error('menu_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Pesanan</label>
                        <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah', 1) }}" min="1" required>
                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status Pesanan</label>
                        <select name="status_pesanan" class="form-select @error('status_pesanan') is-invalid @enderror" required>
                            <option value="diproses" {{ old('status_pesanan') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="selesai" {{ old('status_pesanan') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                        @error('status_pesanan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('pesanans.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Pesanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection