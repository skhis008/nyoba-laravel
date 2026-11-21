@extends('layouts.app')

@section('judul', 'Daftar Produk')

@section('isi')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Daftar Produk</h3>
        <a href="{{ route('produk.create') }}" class="btn btn-primary">+ Tambah Produk</a>
    </div>

    <form action="{{ route('produk.index') }}" method="GET" class="mb-3">
        <div class="input-group" style="max-width: 400px;">
            <input type="text" name="cari" value="{{ $cari }}" class="form-control"
                placeholder="Cari nama produk...">
            <button type="submit" class="btn btn-outline-secondary">Cari</button>
            @if ($cari)
                <a href="{{ route('produk.index') }}" class="btn btn-outline-danger">Reset</a>
            @endif
        </div>
    </form>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produk as $item)
                        <tr>
                            <td>{{ $produk->firstItem() + $loop->index }}</td>
                            <td>
                                @if ($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}"
                                        class="rounded border" style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <span class="text-muted small">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>{{ $item->nama }}</td>
                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>{{ $item->stok }}</td>
                            <td class="text-end">
                                <a href="{{ route('produk.edit', $item) }}" class="btn btn-sm btn-warning">Ubah</a>

                                <form action="{{ route('produk.destroy', $item) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                {{ $cari ? 'Produk "' . $cari . '" tidak ditemukan.' : 'Belum ada produk.' }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $produk->links() }}
    </div>
@endsection