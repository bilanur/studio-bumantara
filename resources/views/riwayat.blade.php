@php($title = 'Riwayat Pesanan | Bumantara Studio')

@push('styles')
<link href="{{ asset('assets/css/riwayat.css') }}" rel="stylesheet">
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

                <li class="sidebar-item">
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

                <li class="sidebar-item active">
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

            <h2 class="page-title">Riwayat Pesanan</h2>

            @if($bookings->count())

            <div class="orders-grid">

                @foreach($bookings as $booking)

                <div class="order-card">

                    <div class="order-code">{{ $booking->kode_booking }}</div>

                    <strong>{{ $booking->package->name }}</strong>

                    <div class="order-date">
                        📅 {{ $booking->tanggal?->format('d M Y') }} • {{ $booking->waktu }}
                    </div>

                    <span class="badge">Selesai</span>

                    <div class="order-price">
                        Rp {{ number_format($booking->total_pembayaran,0,',','.') }}
                    </div>

                </div>

                @endforeach

            </div>

            @else
            <p>Belum ada riwayat pesanan.</p>
            @endif

        </main>

    </div>

</x-layout>