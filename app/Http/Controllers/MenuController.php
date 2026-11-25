<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('kategori')->latest()->get();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('menus.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'kode_menu' => 'required|string|max:20|unique:menus,kode_menu',
            'nama_menu' => 'required|string|max:100',
            'harga' => 'required|integer|min:1000',
            'status' => 'required|in:tersedia,habis',
        ]);

        Menu::create($validated);

        return redirect()->route('menus.index')
            ->with('success', 'Menu baru berhasil ditambahkan.');
    }

    public function edit(Menu $menu)
    {
        $kategoris = Kategori::all();
        return view('menus.edit', compact('menu', 'kategoris'));
    }

    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'kode_menu' => 'required|string|max:20|unique:menus,kode_menu,' . $menu->id,
            'nama_menu' => 'required|string|max:100',
            'harga' => 'required|integer|min:1000',
            'status' => 'required|in:tersedia,habis',
        ]);

        $menu->update($validated);

        return redirect()->route('menus.index')
            ->with('success', 'Data menu berhasil diperbarui.');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menus.index')
            ->with('success', 'Menu berhasil dihapus.');
    }
}