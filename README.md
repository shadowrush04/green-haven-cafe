# Green Haven Cafe — Sistem Kasir & Manajemen Kedai

Aplikasi web berbasis **Laravel** dan **Bootstrap 5** untuk mengelola operasional harian **Green Haven Cafe**, mencakup pencatatan pesanan pelanggan, manajemen daftar menu dan kategori, serta pengelolaan akun pegawai berbasis hak akses (Multi Role Authentication).

---

## Anggota Kelompok dan Kontribusi nya
1. Moch. Albany Alfachrezi Syechan 10124056 IF2
  <br> • Perancangan struktur database (4 tabel relasional), *migration*, dan *seeder* akun default.<br>• Implementasi sistem autentikasi & hak akses (*Multi-Role* Admin & Kasir), Kelola Akun Pegawai, serta Ganti Password.<br>• Pengembangan modul CRUD **Manajemen Kategori** dan **Manajemen Menu**.<br>• Pengaturan repositori GitHub dan integrasi kerangka *layout* utama aplikasi.
3. Yusya Raditya 10124059 IF2
  <br> • Pengembangan modul **Transaksi Pesanan** (pencatatan pesanan, kalkulasi otomatis `total_harga`, dan manajemen status pesanan).<br>• Pengembangan logika **Dashboard Statistik** (agregasi total kategori, menu, pesanan aktif, dan pendapatan).<br>• Membuat laporan <br>• Penyesuaian responsivitas halaman transaksi & dashboard, pengujian alur fitur (*testing* peran Admin & Kasir), serta ekspor database `.sql` dan dokumentasi.
   
   ## Transparansi Penggunaan AI
Dalam pengembangan aplikasi ini, kelompok kami memanfaatkan bantuan **Kecerdasan Buatan (AI)** secara terbatas dan bertanggung jawab pada bagian **perancangan antarmuka (*User Interface* / *Frontend*)**, meliputi pembuatan kerangka komponen tampilan berbasis **Bootstrap 5**, penataan tata letak halaman (*Blade templates*), serta pemilihan palet warna tema kedai. Seluruh struktur basis data, logika *backend* Laravel, alur autentikasi, relasi antar-tabel, serta pengujian fungsionalitas sistem dirancang, diintegrasikan, dan diverifikasi secara mandiri oleh anggota kelompok.

---

## Fitur Utama
* **Autentikasi & Hak Akses (*Role-Based Access Control*):**
  * **Admin:** Akses penuh ke Dashboard statistik, Manajemen Kategori, Manajemen Menu, Transaksi Pesanan, Kelola Akun Pegawai (tambah/hapus akun), dan Ganti Password.
  * **Kasir:** Akses ke Dashboard, Pencatatan & Manajemen Status Pesanan, serta Ganti Password.
  * Registrasi publik dinonaktifkan demi keamanan operasional; penambahan akun pegawai dilakukan melalui panel Admin.
* **Dashboard Statistik:** Menampilkan ringkasan total kategori, total menu, jumlah pesanan yang sedang diproses, dan total pendapatan.
* **Transaksi Pesanan Otomatis:** Menghitung `total_harga` secara otomatis berdasarkan harga menu dikalikan jumlah pesanan.

---

## Struktur Database (`db_green_haven_cafe`)
Aplikasi menggunakan **4 tabel** yang saling berelasi (*Primary Key* & *Foreign Key*):
1. **`users`**: Menyimpan data pengguna (`id`, `name`, `email`, `password`, `role` [`admin`, `kasir`]).
2. **`kategoris`**: Menyimpan kategori hidangan (`id`, `nama_kategori`, `deskripsi`).
3. **`menus`**: Menyimpan daftar menu (`id`, `kategori_id`, `kode_menu`, `nama_menu`, `harga`, `status`) — berelasi ke `kategoris`.
4. **`pesanans`**: Menyimpan transaksi pelanggan (`id`, `user_id`, `menu_id`, `nama_pelanggan`, `nomor_meja`, `jumlah`, `total_harga`, `status_pesanan`) — berelasi ke `users` dan `menus`.

---

## Akun Login Default (Hasil Seeder)
| Role | Email | Password |
| :--- | :--- | :--- |
| **Admin** | `adminHavenCafe@cafe.com` | `greenhavencafe123` |
| **Kasir** | `kasircafeS1@cafe.com` | `password` |

---

## Kebutuhan Sistem & Cara Instalasi
**Kebutuhan Sistem:** PHP >= 8.3, Composer, Node.js dan NPM, serta MySQL / MariaDB (Laragon).

1. **Clone repositori ini:**
   ```bash
   git clone https://github.com/shadowrush04/green-haven-cafe.git
   cd green-haven-cafe
   ```
2. **Install dependensi PHP & Frontend:**
   ```bash
   composer install
   npm install
   ```
3. **Konfigurasi file `.env`:**
   ```bash
   copy .env.example .env
   php artisan key:generate
   ```
   Sesuaikan pengaturan database MySQL di dalam file `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_green_haven_cafe
   DB_USERNAME=root
   DB_PASSWORD=
   ```
4. **Siapkan Database:**
   * Buat database kosong bernama `db_green_haven_cafe` di Laragon / phpMyAdmin.
   * Impor file `db_green_haven_cafe.sql` yang tersedia di repositori ini, atau jalankan perintah:
     ```bash
     php artisan migrate:fresh --seed
     ```
5. **Build aset tampilan & jalankan aplikasi:**
   ```bash
   npm run build
   php artisan serve
   ```
   *(Jika menggunakan Laragon di folder `www/cafe`, sesuaikan `APP_URL=http://localhost/cafe/public` atau `APP_URL=http://cafe.test` pada file `.env`, lalu akses langsung melalui alamat tersebut di browser).*
