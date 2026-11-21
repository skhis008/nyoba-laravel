<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $daftar = [
            ['nama' => 'Kopi Susu', 'harga' => 18000, 'stok' => 25],
            ['nama' => 'Roti Bakar', 'harga' => 15000, 'stok' => 40],
            ['nama' => 'Es Teh Manis', 'harga' => 5000, 'stok' => 50],
        ];

        foreach ($daftar as $item) {
            Produk::create([
                'nama' => $item['nama'],
                'deskripsi' => 'Contoh',
                'harga' => $item['harga'],
                'stok' => $item['stok'],
            ]);
        }
    }
}
