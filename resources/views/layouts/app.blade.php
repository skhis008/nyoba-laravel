<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('judul', 'Admin Toko')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="bg-light">
        <div class="d-flex">
            <aside class="bg-dark text-white p-3 d-flex flex-column justify-content-between" style="width: 240px; min-height: 100vh;">
                <div>
                    <h5 class="mb-4 px-2">Admin Toko</h5>
                    <ul class="nav flex-column gap-1">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('produk.index') }}">Produk</a>
                        </li>
                    </ul>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm w-100">Keluar</button>
                </form>
            </aside>

            <main class="flex-grow-1 p-4">
                @if (session('sukses'))
                    <div class="alert alert-success">{{ session('sukses') }}</div>
                @endif

                @yield('isi')
            </main>
        </div>
    </body>
</html>