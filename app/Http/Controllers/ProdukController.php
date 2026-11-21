<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController
{
    public function index(Request $request)
    {
        $cari = $request->input('cari');

        $produk = Produk::query()
            ->when($cari, function ($query) use ($cari) {
                $query->where('nama', 'like', '%' . $cari . '%');
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('produk.index', compact('produk', 'cari'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|max:100',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        Produk::create($data);

        return redirect()->route('produk.index')
            ->with('sukses', 'Produk berhasil ditambahkan.');
    }

    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $data = $request->validate([
            'nama' => 'required|max:100',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        $produk->update($data);

        return redirect()->route('produk.index')
            ->with('sukses', 'Produk berhasil diubah.');
    }

    public function destroy(Produk $produk)
    {
        if ($produk->gambar) {
            Storage::disk('public')->delete($produk->gambar);
        }

        $produk->delete();

        return redirect()->route('produk.index')
            ->with('sukses', 'Produk berhasil dihapus.');
    }
}