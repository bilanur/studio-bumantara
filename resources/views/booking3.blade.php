@php($title = 'Booking3 | Bumantara Studio')

@push('styles')
<link href="{{ asset('assets/css/booking3.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/booking3.js') }}" defer></script>
@endpush

<x-layout>

    <!-- Sidebar -->
    <div class="dashboard-layout">
        <aside class="sidebar">
            <ul class="sidebar-menu">

                <!-- USERNAME (BUKAN LINK) -->
                <li class="sidebar-item user-item">
                    <span class="sidebar-icon">👤</span>
                    <span>Febri Harijadi</span>
                </li>

                <!-- PESANAN SAYA -->
                <li class="sidebar-item {{ request()->routeIs('booking3') ? 'active' : '' }}">
                    <span class="sidebar-icon">📋</span>
                    <a href="{{ route('booking3') }}" class="sidebar-link">
                        Pesanan Saya
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('testimoni') ? 'active' : '' }}">
                    <span class="sidebar-icon">✍️</span>
                    <a href="{{ route('testimoni') }}" class="sidebar-link">
                        Tulis Testimoni Anda
                    </a>
                </li>

            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Page Title -->
            <div class="page-title">
                <h1>Riwayat Pesanan</h1>
            </div>

            <!-- Orders Container -->
            <div class="orders-container">
                <!-- Order 1 -->
                <div class="order-card">
                    <img src="path/ke/foto-order1.jpg" alt="Order 1" class="order-image">
                    <div class="order-info">
                        <h3 class="order-title">Couple Self Photo Session - Studio 1</h3>
                        <div class="order-details">
                            <div class="order-detail-item">
                                <span class="order-detail-label">Tanggal & Waktu:</span> 8 Desember 2025 | 14:00 WIB
                            </div>
                            <div class="order-detail-item">
                                <span class="order-detail-label">Jumlah Orang:</span> 2 orang
                            </div>
                            <div class="order-detail-item">
                                <span class="order-detail-label">Durasi:</span> 15 menit
                            </div>
                            <div class="order-price">Rp 80.000</div>
                        </div>
                    </div>
                    <div class="order-status">
                        <button class="status-btn pending">Menunggu Pembayaran</button>
                    </div>
                </div>

                <!-- Order 2 -->
                <div class="order-card">
                    <img src="path/ke/foto-order2.jpg" alt="Order 2" class="order-image">
                    <div class="order-info">
                        <h3 class="order-title">Foto Keluarga - Studio 2</h3>
                        <div class="order-details">
                            <div class="order-detail-item">
                                <span class="order-detail-label">Tanggal & Waktu:</span> 5 Desember 2025 | 10:00 WIB
                            </div>
                            <div class="order-detail-item">
                                <span class="order-detail-label">Jumlah Orang:</span> 5 orang
                            </div>
                            <div class="order-detail-item">
                                <span class="order-detail-label">Durasi:</span> 30 menit
                            </div>
                            <div class="order-price">Rp 150.000</div>
                        </div>
                    </div>
                    <div class="order-status">
                        <button class="status-btn completed">Selesai</button>
                    </div>
                </div>

                <!-- Order 3 -->
                <div class="order-card">
                    <img src="path/ke/foto-order3.jpg" alt="Order 3" class="order-image">
                    <div class="order-info">
                        <h3 class="order-title">Foto Wisuda - Studio 1</h3>
                        <div class="order-details">
                            <div class="order-detail-item">
                                <span class="order-detail-label">Tanggal & Waktu:</span> 10 Desember 2025 | 16:00 WIB
                            </div>
                            <div class="order-detail-item">
                                <span class="order-detail-label">Jumlah Orang:</span> 1 orang
                            </div>
                            <div class="order-detail-item">
                                <span class="order-detail-label">Durasi:</span> 20 menit
                            </div>
                            <div class="order-price">Rp 100.000</div>
                        </div>
                    </div>
                    <div class="order-status">
                        <button class="status-btn pending">Menunggu Pembayaran</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

</x-layout>