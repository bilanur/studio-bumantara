@php($title = 'Pesanan Aktif | Bumantara Studio')

@push('styles')
<link href="{{ asset('assets/css/booking3.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/booking3.js') }}" defer></script>
@endpush

<x-layout>

    <div class="dashboard-layout">

        <aside class="sidebar">

            <ul class="sidebar-menu">

                <li class="sidebar-item user-item">
                    <span class="sidebar-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </span>
                    <span>{{ Auth::check() ? Auth::user()->name : 'Guest' }}</span>
                </li>

                <li class="sidebar-item active">
                    <a href="{{ route('booking3') }}">
                        <span class="sidebar-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M9 11H3v2h6v-2zm0-4H3v2h6V7zm0 8H3v2h6v-2zm12-6v-2h-6v2h6zm0 4v-2h-6v2h6zm0 4v-2h-6v2h6zM7 7v10h10V7H7zm2 8V9h6v6H9z"></path>
                                <rect x="9" y="9" width="6" height="6"></rect>
                            </svg>
                        </span>
                        <span>Pesanan Aktif</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('booking.riwayat') }}">
                        <span class="sidebar-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </span>
                        <span>Riwayat Pesanan</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('testimoni') }}">
                        <span class="sidebar-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                        </span>
                        <span>Tulis Testimoni</span>
                    </a>
                </li>

            </ul>

        </aside>

        <main class="main-content">

            <h2 class="page-title">Pesanan Aktif</h2>

            @if($bookings->count())

                <div class="orders-grid">

                    @foreach($bookings as $booking)

                        @if($booking->status != 'Selesai')

                            <div class="order-card">

                                <strong>{{ $booking->package->name }}</strong>

                                <div class="order-date">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                    <span>{{ $booking->tanggal?->format('d M Y') }} • {{ $booking->waktu }}</span>
                                </div>

                                <span class="badge {{ strtolower(str_replace(' ', '-', $booking->status)) }}">
                                    {{ $booking->status }}
                                </span>

                                <div class="order-price">
                                    Rp {{ number_format($booking->total_pembayaran, 0, ',', '.') }}
                                </div>

                                @if($booking->status == 'Menunggu Pembayaran')
                                    <a class="btn-wa"
                                        target="_blank"
                                        href="https://wa.me/62859109851955?text={{ urlencode('Halo saya ingin konfirmasi pembayaran booking ' . $booking->kode_booking) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                        </svg>
                                        <span>Konfirmasi WhatsApp</span>
                                    </a>
                                @endif

                            </div>

                        @endif

                    @endforeach

                </div>

            @else

                <div class="empty-state">
                    <div class="empty-state-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 11H3v2h6v-2zm0-4H3v2h6V7zm0 8H3v2h6v-2zm12-6v-2h-6v2h6zm0 4v-2h-6v2h6zm0 4v-2h-6v2h6z"></path>
                            <line x1="4" y1="6" x2="4" y2="6.01"></line>
                            <line x1="4" y1="12" x2="4" y2="12.01"></line>
                            <line x1="4" y1="18" x2="4" y2="18.01"></line>
                        </svg>
                    </div>
                    <p class="empty-state-text">Belum ada pesanan aktif.<br>Mulai booking sekarang untuk melihat pesanan Anda di sini.</p>
                    <a href="{{ route('home') }}" class="empty-state-button">Lihat Paket Layanan</a>
                </div>

            @endif

        </main>

    </div>

</x-layout>