<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary-color: #2B4D62;
            --primary-dark: #1e3647;
            --primary-light: #3d6680;
            --accent-color: #4a90e2;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        .sidebar {
            background: linear-gradient(180deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.15);
            overflow-y: auto;
            overflow-x: hidden;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 1.25rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 0.5rem;
            position: sticky;
            top: 0;
            background: var(--primary-color);
            z-index: 10;
        }

        .sidebar-header h5 {
            font-weight: 600;
            letter-spacing: 0.5px;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.2rem;
        }

        .sidebar-header h5 i {
            font-size: 1.4rem;
            color: var(--accent-color);
        }

        .sidebar-nav {
            padding-bottom: 2rem;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin: 0.25rem 0.75rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
        }

        .nav-link i {
            font-size: 1.2rem;
            width: 20px;
            text-align: center;
            flex-shrink: 0;
        }

        .nav-link span {
            white-space: nowrap;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.12);
            color: #fff !important;
            transform: translateX(5px);
        }

        .nav-link.active {
            background-color: var(--accent-color);
            color: #fff !important;
            box-shadow: 0 4px 12px rgba(74, 144, 226, 0.4);
        }

        .logout-section {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logout-btn {
            color: #ff6b6b !important;
            padding: 0.75rem 1rem !important;
        }

        .logout-btn:hover {
            background-color: rgba(255, 107, 107, 0.15) !important;
            color: #ff5252 !important;
        }

        .main-content {
            margin-left: 250px;
            padding: 2rem;
            min-height: 100vh;
            background-color: #f8f9fa;
            width: calc(100% - 250px);
        }

        /* Perbaikan untuk tabel dan konten */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table {
            min-width: 800px;
        }

        /* Scrollbar Styling untuk Sidebar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 4px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                width: 240px;
            }

            .main-content {
                margin-left: 240px;
                width: calc(100% - 240px);
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 1rem;
            }

            .mobile-toggle {
                display: block !important;
                position: fixed;
                top: 1rem;
                left: 1rem;
                z-index: 1001;
                background: var(--primary-color);
                color: white;
                border: none;
                padding: 0.5rem 1rem;
                border-radius: 8px;
            }
        }

        .mobile-toggle {
            display: none;
        }
    </style>
</head>

<body>

    <!-- Mobile Toggle Button -->
    <button class="mobile-toggle" onclick="toggleSidebar()">
        <i class="bi bi-list fs-4"></i>
    </button>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar text-white" id="sidebar">
            <div class="sidebar-header">
                <h5>
                    <i class="bi bi-grid-fill"></i>
                    Admin Panel
                </h5>
            </div>
            <ul class="nav flex-column sidebar-nav">
                <li>
                    <a href="/admin/dashboard" class="nav-link">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="bi bi-house-door"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/user" class="nav-link">
                        <i class="bi bi-people"></i>
                        <span>Data User</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/booking" class="nav-link">
                        <i class="bi bi-calendar-check"></i>
                        <span>Data Booking</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/timeslots" class="nav-link">
                        <i class="bi bi-clock-history"></i>
                        <span>Jadwal Studio</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.package.index') }}" class="nav-link">
                        <i class="bi bi-box-seam"></i>
                        <span>Paket & Harga</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/transactions" class="nav-link">
                        <i class="bi bi-cloud-upload"></i>
                        <span>Upload Foto</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.gallery.index') }}" class="nav-link">
                        <i class="bi bi-images"></i>
                        <span>Galeri</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/testimoni" class="nav-link">
                        <i class="bi bi-chat-square-quote"></i>
                        <span>Testimoni</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/carousel" class="nav-link">
                        <i class="bi bi-file-image"></i>
                        <span>Carousel</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.report.index') }}" class="nav-link">
                        <i class="bi bi-file-earmark-bar-graph"></i>
                        <span>Laporan</span>
                    </a>
                </li>

                <li class="logout-section">
                    <form method="POST" action="{{ route('logout') }}" class="mb-0">
                        @csrf
                        <button type="submit" class="nav-link logout-btn bg-transparent border-0 w-100 text-start d-flex align-items-center gap-3">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Active link handler
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('.sidebar .nav-link');
            
            navLinks.forEach(link => {
                const href = link.getAttribute('href');
                if (href && currentPath.includes(href) && href !== '/') {
                    link.classList.add('active');
                }
            });
        });

        // Mobile sidebar toggle
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.querySelector('.mobile-toggle');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !toggle.contains(event.target) &&
                sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
            }
        });
    </script>

</body>

</html>