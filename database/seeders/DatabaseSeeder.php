<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Akun Admin & Kasir
        $admin = User::create([
            'name' => 'Admin Cafe',
            'email' => 'adminHavenCafe@cafe.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $kasir = User::create([
            'name' => 'Kasir Shift 1',
            'email' => 'kasircafeS1@cafe.com',
            'password' => Hash::make('password'),
            'role' => 'kasir',
        ]);

        // 2. Buat Data Kategori Menu
        $espresso = Kategori::create([
            'nama_kategori' => 'Espresso Based',
            'deskripsi' => 'Minuman kopi berbasis espresso panas maupun dingin yang cocok untuk pecinta kopi.',
        ]);

        $nonCoffee = Kategori::create([
            'nama_kategori' => 'Non-Coffee',
            'deskripsi' => 'Minuman cokelat, matcha, dan minuman segar lain nya.',
        ]);

        $snack = Kategori::create([
            'nama_kategori' => 'Pastry & Snack',
            'deskripsi' => 'Makanan ringan pendamping kopi.',
        ]);
        $foods = Kategori::create([
            'nama_kategori' => 'Foods',
            'deskripsi' => 'Makanan Berat yang sangat lezat dan berkualiatas.',
        ]);

        // 3. Buat Data Daftar Menu
        $latte = Menu::create([
            'kategori_id' => $espresso->id,
            'kode_menu' => 'MN-001',
            'nama_menu' => 'Caffe Latte',
            'harga' => 25000,
            'status' => 'tersedia',
        ]);

        $americano = Menu::create([
            'kategori_id' => $espresso->id,
            'kode_menu' => 'MN-002',
            'nama_menu' => 'Iced Americano',
            'harga' => 20000,
            'status' => 'tersedia',
        ]);

        Menu::create([
            'kategori_id' => $nonCoffee->id,
            'kode_menu' => 'MN-003',
            'nama_menu' => 'Matcha Latte',
            'harga' => 28000,
            'status' => 'tersedia',
        ]);

        Menu::create([
            'kategori_id' => $nonCoffee->id,
            'kode_menu' => 'MN-004',
            'nama_menu' => 'Fresh Lime Squash',
            'harga' => 20000,
            'status' => 'tersedia',
        ]);

        Menu::create([
            'kategori_id' => $snack->id,
            'kode_menu' => 'MN-005',
            'nama_menu' => 'Butter Croissant',
            'harga' => 22000,
            'status' => 'tersedia',
        ]);
         Menu::create([
            'kategori_id' => $snack->id,
            'kode_menu' => 'MN-006',
            'nama_menu' => 'French Fries',
            'harga' => 18000,
            'status' => 'tersedia',
        ]);
        Menu::create([
            'kategori_id' => $snack->id,
            'kode_menu' => 'MN-007',
            'nama_menu' => 'Cheese Cake',
            'harga' => 22000,
            'status' => 'tersedia',
        ]);
        Menu::create([
            'kategori_id' => $foods->id,
            'kode_menu' => 'MN-008',
            'nama_menu' => 'Nasi Goreng',
            'harga' => 25000,
            'status' => 'tersedia',
        ]);
        Menu::create([
            'kategori_id' => $snack->id,
            'kode_menu' => 'MN-009',
            'nama_menu' => 'Chicken Rice Bowl',
            'harga' => 22000,
            'status' => 'tersedia',
        ]);

        // 4. Buat Contoh Transaksi Pesanan
        Pesanan::create([
            'user_id' => $kasir->id,
            'menu_id' => $latte->id,
            'nama_pelanggan' => 'Albany',
            'nomor_meja' => 4,
            'jumlah' => 2,
            'total_harga' => 50000,
            'status_pesanan' => 'diproses',
        ]);

        Pesanan::create([
            'user_id' => $admin->id,
            'menu_id' => $americano->id,
            'nama_pelanggan' => 'Yusya',
            'nomor_meja' => 7,
            'jumlah' => 1,
            'total_harga' => 20000,
            'status_pesanan' => 'selesai',
        ]);
    }
}