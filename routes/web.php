<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Models\Produk;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Rute Autentikasi
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.proses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute Dashboard & Produk (Wajib Login)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $jumlahProduk = Produk::count();
        $totalStok = Produk::sum('stok');
        $rataHarga = Produk::avg('harga') ?? 0;
        $produkTerbaru = Produk::latest()->take(5)->get();

        return view('dashboard', compact('jumlahProduk', 'totalStok', 'rataHarga', 'produkTerbaru'));
    })->name('dashboard');

    Route::resource('produk', ProdukController::class);
});