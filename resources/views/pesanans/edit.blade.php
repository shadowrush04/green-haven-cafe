@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-bold">Edit Pesanan Pelanggan</div>
            <div class="card-body">
                <form action="{{ route('pesanans.update', $pesanan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" class="form-control @error('nama_pelanggan') is-invalid @enderror" value="{{ old('nama_pelanggan', $pesanan->nama_pelanggan) }}" required>
                        @error('nama_pelanggan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor Meja (1 - 50)</label>
                        <input type="number" name="nomor_meja" class="form-control @error('nomor_meja') is-invalid @enderror" value="{{ old('nomor_meja', $pesanan->nomor_meja) }}" min="1" max="50" required>
                        @error('nomor_meja')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pilih Menu</label>
                        <select name="menu_id" class="form-select @error('menu_id') is-invalid @enderror" required>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}" {{ old('menu_id', $pesanan->menu_id) == $menu->id ? 'selected' : '' }}>
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
                        <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah', $pesanan->jumlah) }}" min="1" required>
                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status Pesanan</label>
                        <select name="status_pesanan" class="form-select @error('status_pesanan') is-invalid @enderror" required>
                            <option value="diproses" {{ old('status_pesanan', $pesanan->status_pesanan) == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="selesai" {{ old('status_pesanan', $pesanan->status_pesanan) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                        @error('status_pesanan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('pesanans.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Update Pesanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection