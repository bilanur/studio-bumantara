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
                    <span class="sidebar-icon">👤</span>
                    <span>Febri Harijadi</span>
                </li>

                <li class="sidebar-item active">
                    📋 Pesanan Aktif
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('booking.riwayat') }}">🕘 Riwayat Pesanan</a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('testimoni') }}">✍️ Tulis Testimoni</a>
                </li>

            </ul>
        </aside>

        <main class="main-content">

            <h2>Pesanan Aktif</h2>

            @if($bookings->count())

            @foreach($bookings as $booking)

            @if($booking->status != 'Selesai')

            <div class="order-card">

                <h4>{{ $booking->kode_booking }}</h4>

                <p><strong>{{ $booking->package->name }}</strong></p>

                <p>
                    📅 {{ $booking->tanggal }} | {{ $booking->waktu }}
                </p>

                <p>Status: <strong>{{ $booking->status }}</strong></p>

                <p class="order-price">
                    Rp {{ number_format($booking->total_pembayaran,0,',','.') }}
                </p>

                @if($booking->status == 'Menunggu Pembayaran')
                <a class="btn-wa"
                    target="_blank"
                    href="https://wa.me/62859109851955?text={{ urlencode('Halo saya ingin konfirmasi pembayaran booking '.$booking->kode_booking) }}">
                    💬 Konfirmasi WhatsApp
                </a>
                @endif

            </div>

            @endif

            @endforeach

            @else

            <p>Belum ada pesanan aktif.</p>

            @endif

        </main>

    </div>

</x-layout>
