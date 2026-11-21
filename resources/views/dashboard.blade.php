@extends('layouts.app')

@section('judul', 'Dashboard')

@section('isi')
    <h3 class="mb-4">Dashboard</h3>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="text-muted small">Jumlah Produk</div>
                    <div class="fs-2 fw-bold">{{ $jumlahProduk }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="text-muted small">Total Stok</div>
                    <div class="fs-2 fw-bold">{{ $totalStok }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="text-muted small">Rata-rata Harga</div>
                    <div class="fs-2 fw-bold">Rp {{ number_format($rataHarga, 0, ',', '.') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Produk Terbaru</h5>
                <a href="{{ route('produk.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produkTerbaru as $produk)
                            <tr>
                                <td>{{ $produk->nama }}</td>
                                <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                                <td>{{ $produk->stok }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-4">Belum ada produk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection