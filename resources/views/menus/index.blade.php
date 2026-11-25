@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold mb-0">Daftar Menu Kedai</h4>
    <a href="{{ route('menus.create') }}" class="btn btn-primary">+ Tambah Menu</a>
</div>

@php
    $groupedMenus = $menus->groupBy('kategori_id');
@endphp

@forelse ($kategoris as $kategori)
    @php
        $items = $groupedMenus->get($kategori->id, collect());
    @endphp

    <div class="mb-4">
        <div class="d-flex justify-content-between align-items-center bg-light border-start border-4 border-secondary rounded px-3 py-2 mb-2">
            <h5 class="fw-bold mb-0">{{ $kategori->nama_kategori }}</h5>
            <span class="badge bg-secondary">{{ $items->count() }} Menu</span>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Kode</th>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th width="18%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $menu)
                            <tr>
                                <td><span class="badge bg-secondary">{{ $menu->kode_menu }}</span></td>
                                <td class="fw-semibold">{{ $menu->nama_menu }}</td>
                                <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge {{ $menu->status === 'tersedia' ? 'bg-success' : 'bg-danger' }}">
                                        {{ ucfirst($menu->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus menu ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada menu di kategori ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@empty
    <div class="card border-0 shadow-sm">
        <div class="card-body text-center text-muted">
            Belum ada data menu.
        </div>
    </div>
@endforelse
@endsection