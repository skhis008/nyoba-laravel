<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class DashboardController
{
    public function index()
    {
        $jumlahProduk = Produk::count();
        $totalStok = Produk::sum('stok');
        $rataHarga = (int) Produk::avg('harga');
        $produkTerbaru = Produk::latest()->take(5)->get();

        return view('dashboard', compact(
            'jumlahProduk',
            'totalStok',
            'rataHarga',
            'produkTerbaru',
        ));
    }
}
