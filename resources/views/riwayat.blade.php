@php($title = 'Riwayat Pesanan | Bumantara Studio')

@push('styles')
<style>
    .dashboard-layout {
        display: flex;
        min-height: 100vh;
        background: #f6f7fb;
    }

    /* SIDEBAR */

    .sidebar {
        width: 260px;
        background: white;
        padding: 2rem 1.5rem;
        position: sticky;
        top: 100px;
        height: fit-content;
        min-height: calc(100vh - 120px);
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(42, 73, 98, 0.08);
        border: 1px solid #e1e8ed;
    }

    .sidebar-menu {
        list-style: none;
    }

    .sidebar-item {
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 0.9rem;
        color: #64748b;
        cursor: pointer;
        transition: all 0.2s;
        padding: 0.875rem 1rem;
        border-radius: 8px;
    }

    .sidebar-item a {
        text-decoration: none;
        color: inherit;
    }

    .sidebar-item:hover {
        background: #f0f4f8;
        color: #334e68;
    }

    .sidebar-item.active {
        background: #dfe9f3;
        color: #2a4962;
        font-weight: 600;
        border-left: 3px solid #2a4962;
        padding-left: calc(1rem - 3px);
    }

    .sidebar-icon {
        font-size: 1.3rem;
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
        color: #16a34a;
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
        background: #dcfce7;
        color: #15803d;
    }

    .order-price {
        margin-top: 12px;
        font-size: 18px;
        font-weight: 700;
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

<x-layout>

    <div class="dashboard-layout">

        <aside class="sidebar">

            <ul class="sidebar-menu">

                <li class="sidebar-item user-item">
                    <span class="sidebar-icon">👤</span>
                    <span>{{ Auth::check() ? Auth::user()->name : 'Guest' }}</span>
                </li>

                </li>

                <li class="sidebar-item">
                    <a href="{{ route('booking3') }}">📋 Pesanan Aktif</a>
                </li>

                <li class="sidebar-item active">
                    <a href="{{ route('booking.riwayat') }}">🕘 Riwayat Pesanan</a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('testimoni') }}">✍️ Tulis Testimoni</a>
                </li>

            </ul>

        </aside>

        <main class="main-content">

            <div class="page-title">Riwayat Pesanan</div>

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