@php($title = 'Riwayat Pesanan | Bumantara Studio')

@push('styles')
<link href="{{ asset('assets/css/riwayat.css') }}" rel="stylesheet">
@endpush

<x-layout>

    <div class="dashboard-layout">

        <aside class="sidebar">
            <ul class="sidebar-menu">

                <li class="sidebar-item user-item">
                    <span class="sidebar-icon">👤</span>
                    <span>Febri Harijadi</span>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('booking3') }}">📋 Pesanan Aktif</a>
                </li>

                <li class="sidebar-item active">
                    🕘 Riwayat Pesanan
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('testimoni') }}">✍️ Tulis Testimoni</a>
                </li>

            </ul>
        </aside>

        <main class="main-content">

            <h2>Riwayat Pesanan</h2>

            @if($bookings->count())

            @foreach($bookings as $booking)

            <div class="order-card">

                <h4>{{ $booking->kode_booking }}</h4>

                <p><strong>{{ $booking->package->name }}</strong></p>

                <p>
                    📅 {{ $booking->tanggal }} | {{ $booking->waktu }}
                </p>

                <p>Status: <strong>Selesai</strong></p>

                <p class="order-price">
                    Rp {{ number_format($booking->total_pembayaran,0,',','.') }}
                </p>

            </div>

            @endforeach

            @else

            <p>Belum ada riwayat pesanan.</p>

            @endif

        </main>

    </div>

</x-layout>