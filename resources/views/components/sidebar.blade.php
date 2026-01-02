<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<div class="sidebar">
    <h2>Admin Dashboard</h2>
    <a href="/admin/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="{{ route('reservations.index') }}"><i class="fas fa-calendar-check"></i> Data Reservasi</a>
    <a href="/rooms/create"><i class="fas fa-bed"></i> Data Kamar</a>
    {{-- <a href="/tipekamar"><i class="fas fa-bed"></i> Data Kamar</a> --}}
    <a href="/fasilitas/create"><i class="fas fa-cogs"></i> Data Fasilitas</a>
    <a href="/laporan"><i class="fas fa-chart-line"></i> Laporan Bulanan</a>
    <a href="/logout" onclick="confirmLogout(event)">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
        @method('DELETE')
    </form>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmLogout(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Anda yakin ingin logout?',
            text: "Anda harus login kembali setelah logout.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Logout!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>
