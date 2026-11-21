@extends('layouts.app')

@section('judul', 'Ubah Produk')

@section('isi')
    <div class="mb-3">
        <h3>Ubah Produk</h3>
        <a href="{{ route('produk.index') }}" class="text-decoration-none">Kembali ke daftar</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('produk.update', $produk) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama" value="{{ old('nama', $produk->nama) }}"
                        class="form-control @error('nama') is-invalid @enderror">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" name="harga" value="{{ old('harga', $produk->harga) }}"
                            class="form-control @error('harga') is-invalid @enderror">
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stok" value="{{ old('stok', $produk->stok) }}"
                            class="form-control @error('stok') is-invalid @enderror">
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Produk</label>
                    @if ($produk->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama }}"
                                class="rounded border" style="width: 100px; height: 100px; object-fit: cover;">
                        </div>
                    @endif
                    <input type="file" name="gambar" accept="image/*"
                        class="form-control @error('gambar') is-invalid @enderror">
                    <div class="form-text">Kosongkan jika tidak ingin mengganti gambar.</div>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection