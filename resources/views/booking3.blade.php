@php($title = 'Pesanan Saya | Bumantara Studio')

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
                <li class="sidebar-item">
                    <span class="sidebar-icon">👤</span>
                    <span>{{ auth()->user()->name ?? 'User' }}</span>
                </li>
                <li class="sidebar-item active">
                    <span class="sidebar-icon">📋</span>
                    <span>Pesananan Saya</span>
                </li>
                <li class="sidebar-item">
                    <span class="sidebar-icon">✍️</span>
                    <span>
                        <a href="{{ route('testimoni') }}" class="booking-btn">
                            Tulis Testimoni Anda
                        </a>
                    </span>
                </li>
            </ul>
        </aside>

        <main class="main-content">
            <div class="page-title">
                <h1>Riwayat Pesanan</h1>
                <p style="color: #64748b; margin-top: 8px;">Total {{ $bookings->count() }} pesanan</p>
            </div>

            <div class="orders-container">
                @if($bookings->count() > 0)
                    @foreach($bookings as $booking)
                    <div class="order-card">
                        <img src="{{ $booking->package->image ?? asset('assets/images/j.jpeg') }}" 
                             alt="{{ $booking->package->name }}" 
                             class="order-image">
                        
                        <div class="order-info">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                                <span style="font-size: 0.875rem; font-weight: 600; color: #2563eb; background: #eff6ff; padding: 4px 12px; border-radius: 6px;">
                                    {{ $booking->kode_booking }}
                                </span>
                                <span style="font-size: 0.75rem; color: #94a3b8;">
                                    {{ $booking->created_at->format('d M Y, H:i') }}
                                </span>
                            </div>

                            <h3 class="order-title">{{ $booking->package->name }}</h3>
                            
                            <div class="order-details">
                                <div class="order-detail-item">
                                    <span class="order-detail-label">📅 Tanggal & Waktu:</span> 
                                    {{ \Carbon\Carbon::parse($booking->tanggal)->format('d F Y') }} | 
                                    {{ date('H:i', strtotime($booking->waktu)) }} {{ $booking->zona_waktu }}
                                </div>
                                <div class="order-detail-item">
                                    <span class="order-detail-label">👥 Jumlah Orang:</span> 
                                    {{ $booking->package->max_people }} orang
                                    @if($booking->extra_people > 0)
                                        <span style="color: #2563eb;">(+{{ $booking->extra_people }} extra)</span>
                                    @endif
                                </div>
                                <div class="order-detail-item">
                                    <span class="order-detail-label">⏱️ Durasi:</span> 
                                    {{ $booking->durasi }}
                                </div>
                                <div class="order-detail-item">
                                    <span class="order-detail-label">💳 Pembayaran:</span> 
                                    {{ $booking->metode_pembayaran }}
                                </div>
                                <div class="order-price">
                                    Rp {{ number_format($booking->total_pembayaran, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="order-status">
                           @php
    $statusClass = 'pending';

    if($booking->status == 'Dikonfirmasi') $statusClass = 'confirmed';
    if($booking->status == 'Selesai') $statusClass = 'completed';
    if($booking->status == 'Batal') $statusClass = 'cancelled';
    if($booking->status == 'Expired') $statusClass = 'expired';
@endphp

                            <button class="status-btn {{ $statusClass }}">
                                {{ $booking->status }}
                            </button>
                            
                            @if($booking->status === 'Menunggu Pembayaran')
                            <a href="https://wa.me/62859109851955?text={{ urlencode('Halo, saya ingin konfirmasi pembayaran untuk Kode Booking: ' . $booking->kode_booking) }}" 
                               target="_blank"
                               class="btn-whatsapp"
                               style="display: inline-block; margin-top: 8px; padding: 8px 16px; background: #25D366; color: white; text-decoration: none; border-radius: 6px; font-size: 0.875rem; font-weight: 600;">
                                💬 Konfirmasi via WhatsApp
                            </a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                @else
                    <div style="text-align: center; padding: 60px 20px;">
                        <div style="font-size: 5rem; opacity: 0.3; margin-bottom: 20px;">📭</div>
                        <h3 style="font-size: 1.5rem; color: #1a202c; margin-bottom: 12px;">
                            Belum Ada Pesanan
                        </h3>
                        <p style="color: #64748b; margin-bottom: 24px;">
                            Anda belum memiliki pesanan. Mulai booking sekarang!
                        </p>
                        <a href="{{ route('packages') }}" 
                           style="display: inline-block; background: #2563eb; color: white; padding: 12px 32px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: background 0.2s;">
                            📸 Lihat Paket Foto
                        </a>
                    </div>
                @endif
            </div>
        </main>
    </div>
</x-layout>