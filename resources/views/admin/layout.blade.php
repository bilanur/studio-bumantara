<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-light">

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-dark text-white p-3" style="width:250px; min-height:100vh">
            <h5 class="mb-4">Dashboard</h5>
            <ul class="nav flex-column gap-2">
                <li><a href="#" class="nav-link text-white">Dashboard</a></li>
                <li><a href="/admin/booking" class="nav-link text-white">Data Booking</a></li>
                <li><a href="/admin/user" class="nav-link text-white">Data User</a></li>
                <li>
                    <a href="{{ route('admin.package.index') }}" class="nav-link text-white">
                        Paket & Harga
                    </a>
                </li>

                <li><a href="/admin/schedule" class="nav-link text-white">Jadwal Studio</a></li>
                <li><a href="/admin/gallery" class="nav-link text-white">Galeri</a></li>
                <li><a href="/admin/testimoni" class="nav-link text-white">Testimoni</a></li>
                <li><a href="/admin/carousel" class="nav-link text-white">Carousel</a></li>
                <li><a href="#" class="nav-link text-white">Laporan</a></li>
                <li>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
            class="nav-link text-danger bg-transparent border-0 text-start w-100">
            Logout
        </button>
    </form>
</li>

            </ul>
        </div>

        <!-- Content -->
        <div class="p-4 w-100">
            @yield('content')
        </div>
    </div>

</body>

</html>