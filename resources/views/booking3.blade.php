@php($title = 'Pesanan Aktif | Bumantara Studio')

@push('styles')
<style>
    .dashboard-layout {
        display: flex;
        min-height: 100vh;
        background: #f6f7fb;
    }

    /* SIDEBAR */

    .sidebar {
        width: 240px;
        background: white;
        border-right: 1px solid #e5e7eb;
        padding: 20px;
    }

    .sidebar-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar-item {
        margin-bottom: 12px;
    }

    .sidebar-item a {
        display: flex;
        gap: 8px;
        align-items: center;
        padding: 10px 14px;
        border-radius: 10px;
        text-decoration: none;
        color: #374151;
        transition: .2s;
    }

    .sidebar-item a:hover {
        background: #f1f5f9;
    }

    .sidebar-item.active a {
        background: #2563eb;
        color: white;
    }

    .user-item {
        font-weight: 600;
        margin-bottom: 24px;
    }

    /* MAIN */

    .main-content {
        flex: 1;
        padding: 32px;
    }

    .page-title {
        font-size: 22px;
        font-weight: 600;
    }

    /* GRID */

    .orders-grid {
        margin-top: 24px;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }

    /* CARD */

    .order-card {
        background: white;
        border-radius: 16px;
        padding: 18px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, .05);
    }

    .order-code {
        font-weight: 600;
        color: #2563eb;
    }

    .order-date {
        font-size: 14px;
        color: #6b7280;
    }

    .badge {
        display: inline-block;
        margin-top: 6px;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        background: #fff7ed;
        color: #ea580c;
    }

    .order-price {
        margin-top: 12px;
        font-size: 18px;
        font-weight: 700;
    }

    .btn-wa {
        margin-top: 14px;
        display: block;
        text-align: center;
        padding: 10px;
        border-radius: 10px;
        background: #22c55e;
        color: white;
        text-decoration: none;
    }

    /* MOBILE */

    @media(max-width:768px) {
        .sidebar {
            display: none;
        }

        .main-content {
            padding: 16px;
        }
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('assets/js/booking3.js') }}" defer></script>
@endpush

<x-layout>

    <div class="dashboard-layout">

        <aside class="sidebar">

            <ul class="sidebar-menu">

                <li class="user-item">
                    👤 {{ Auth::user()->name ?? 'Guest' }}
                </li>

                <li class="sidebar-item active">
                    <a href="{{ route('booking3') }}">📋 Pesanan Aktif</a>
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

            <div class="page-title">Pesanan Aktif</div>

            @if($bookings->count())

            <div class="orders-grid">

                @foreach($bookings as $booking)

                @if($booking->status != 'Selesai')

                <div class="order-card">

                    <div class="order-code">{{ $booking->kode_booking }}</div>

                    <strong>{{ $booking->package->name }}</strong>

                    <div class="order-date">
                        📅 {{ $booking->tanggal?->format('d M Y') }} • {{ $booking->waktu }}
                    </div>

                    <span class="badge">{{ $booking->status }}</span>

                    <div class="order-price">
                        Rp {{ number_format($booking->total_pembayaran,0,',','.') }}
                    </div>

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

            </div>

            @else
            <p>Belum ada pesanan aktif.</p>
            @endif

        </main>

    </div>

</x-layout>