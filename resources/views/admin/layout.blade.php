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
                <li><a href="#" class="nav-link text-white">Paket & Harga</a></li>
                <li><a href="#" class="nav-link text-white">Jadwal Studio</a></li>
                <li><a href="#" class="nav-link text-white">Galeri</a></li>
                <li><a href="#" class="nav-link text-white">Testimoni</a></li>
                <li><a href="#" class="nav-link text-white">Laporan</a></li>
                <li><a href="#" class="nav-link text-danger">Logout</a></li>
            </ul>
        </div>

        <!-- Content -->
        <div class="p-4 w-100">
            @yield('content')
        </div>
    </div>

</body>

</html>