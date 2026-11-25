<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::with(['menu', 'user'])->latest()->get();
        return view('pesanans.index', compact('pesanans'));
    }

    public function create()
    {
        $menus = Menu::where('status', 'tersedia')->get();
        return view('pesanans.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'nama_pelanggan' => 'required|string|max:100',
            'nomor_meja' => 'required|integer|min:1|max:50',
            'jumlah' => 'required|integer|min:1',
            'status_pesanan' => 'required|in:diproses,selesai',
        ]);

        $menu = Menu::findOrFail($validated['menu_id']);
        $validated['user_id'] = Auth::id();
        $validated['total_harga'] = $menu->harga * $validated['jumlah'];

        Pesanan::create($validated);

        return redirect()->route('pesanans.index')
            ->with('success', 'Pesanan pelanggan berhasil dicatat.');
    }

    public function edit(Pesanan $pesanan)
    {
        $menus = Menu::all();
        return view('pesanans.edit', compact('pesanan', 'menus'));
    }

    public function update(Request $request, Pesanan $pesanan)
    {
        $validated = $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'nama_pelanggan' => 'required|string|max:100',
            'nomor_meja' => 'required|integer|min:1|max:50',
            'jumlah' => 'required|integer|min:1',
            'status_pesanan' => 'required|in:diproses,selesai',
        ]);

        $menu = Menu::findOrFail($validated['menu_id']);
        $validated['total_harga'] = $menu->harga * $validated['jumlah'];

        $pesanan->update($validated);

        return redirect()->route('pesanans.index')
            ->with('success', 'Data pesanan berhasil diperbarui.');
    }

    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();

        return redirect()->route('pesanans.index')
            ->with('success', 'Pesanan berhasil dihapus.');
    }
}