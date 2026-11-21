<<<<<<< HEAD
# Admin Toko - Web Manajemen Produk  sederhana make Laravel

Web manajemen toko sederhana dengan fitur crud dan auth.

## Fitur Utama
- **Autentikasi Admin**: Login dan logout dengan proteksi middleware `auth` serta regenerasi sesi.
- **Dashboard Ringkasan**: Menampilkan jumlah total produk, total keseluruhan stok, rata-rata harga produk, dan daftar 5 produk terbaru.
- **Manajemen Produk (CRUD)**:
  - Tambah, ubah, dan hapus data produk (`nama`, `deskripsi`, `harga`, `stok`, `gambar`).
  - Unggah gambar produk (`storage/app/public/produk`) dengan penghapusan otomatis file gambar lama saat diperbarui atau dihapus.
  - Pencarian produk berdasarkan nama yang terintegrasi dengan pagination (`withQueryString()`).

## Teknologi yang Digunakan
- **Backend**: PHP 8.5, Laravel 13
- **Frontend**: Blade Template, Bootstrap 5.3
- **Database**: MySQL / MariaDB / SQLite

## Cara Instalasi Lokal

1. **Clone repositori ini**
   ```bash
   git clone [https://github.com/skhis008/latihan-laravel.git](https://github.com/skhis008/latihan-laravel.git)
   cd latihan-laravel
2. ***Install dependensi PHP***
    ```bash
    composer install
3. ***Salin file konfigurasi .env dan generate application key***
    ```bash
    cp .env.example .env
    php artisan key:generate
4. ***Atur koneksi database di file .env, lalu jalankan migrasi dan seeder akun admin***
    ```bash
    php artisan migrate --seed
5. ***buat symbolic link untuk menyimpan gambar***
    ```bash
    php artisan storage:link
6. ***jalankan server lokal***
    ```bash
    php artisan serve
=======
# nyoba-laravel
>>>>>>> 1f01e63ab8f6adaaeba86794a6b611299f2686ff
