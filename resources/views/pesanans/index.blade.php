@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold mb-0">Daftar Transaksi Pesanan</h4>
    <a href="{{ route('pesanans.create') }}" class="btn btn-primary">+ Catat Pesanan Baru</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body table-responsive">
        <table class="table table-bordered table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Pelanggan</th>
                    <th>Meja</th>
                    <th>Menu</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Kasir</th>
                    <th width="16%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pesanans as $index => $pesanan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="fw-semibold">{{ $pesanan->nama_pelanggan }}</td>
                        <td>Meja {{ $pesanan->nomor_meja }}</td>
                        <td>{{ $pesanan->menu->nama_menu }}</td>
                        <td>{{ $pesanan->jumlah }}x</td>
                        <td class="fw-bold">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge {{ $pesanan->status_pesanan === 'selesai' ? 'bg-success' : 'bg-warning text-dark' }}">
                                {{ ucfirst($pesanan->status_pesanan) }}
                            </span>
                        </td>
                        <td>{{ $pesanan->user->name }}</td>
                        <td>
                            <a href="{{ route('pesanans.edit', $pesanan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('pesanans.destroy', $pesanan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pesanan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted">Belum ada transaksi pesanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection