@php($title = 'Detail Transaksi | Bumantara Studio')

@push('styles')
<link href="{{ asset('assets/css/claim2.css') }}" rel="stylesheet">
@endpush
    <style>
        header,
        header *,
        nav,
        nav *,
        footer,
        footer *,
        .footer,
        .footer *,
        .logo,
        .logo-text-main,
        .logo-text-sub,
        .nav-links,
        .nav-links *,
        .nav-right *,
        .masuk-btn,
        .masuk-btn-outline,
        .profile-trigger,
        .profile-dropdown,
        .profile-dropdown *,
        .footer-section,
        .footer-section *,
        .copyright,
        .social-section * {
            font-family: 'Poppins', sans-serif !important;
        }
    </style>
@push('scripts')
<script src="{{ asset('assets/js/claim-result.js') }}" defer></script>
@endpush

<x-layout>
    <div class="claim-result-page">
        <div class="container">
            <div class="page-title">
                <h1>Detail Transaksi</h1>
            </div>

            <!-- Transaction Card -->
            <div class="transaction-card">
                <div class="card-header">
                    <h2>Informasi Transaksi</h2>
                    <span class="status-badge {{ $transaction->status_badge }}">
                        {{ $transaction->status_text }}
                    </span>
                </div>

                <div class="card-body">
                    <div class="info-row">
                        <span class="label">No Transaksi</span>
                        <span class="value">{{ $transaction->transaction_number }}</span>
                    </div>

                    <div class="info-row">
                        <span class="label">Email</span>
                        <span class="value">{{ $transaction->email }}</span>
                    </div>

                    <div class="info-row">
                        <span class="label">Nama</span>
                        <span class="value">{{ $transaction->customer_name }}</span>
                    </div>

                    <div class="info-row">
                        <span class="label">Paket</span>
                        <span class="value">{{ $transaction->package_name }}</span>
                    </div>

                    <div class="info-row">
                        <span class="label">Tanggal Booking</span>
                        <span class="value">{{ $transaction->formatted_booking_date }}</span>
                    </div>

                    <div class="info-row">
                        <span class="label">Total Pembayaran</span>
                        <span class="value price">{{ $transaction->formatted_price }}</span>
                    </div>
                </div>
            </div>

            <!-- Google Drive Link Card -->
            @if($transaction->drive_link)
            <div class="drive-card">
                <div class="drive-header">
                    <div class="drive-icon-title">
                        <div class="drive-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3>File Foto Anda</h3>
                            <p class="subtitle">Tersimpan di Google Drive</p>
                        </div>
                    </div>
                </div>

                <div class="drive-body">
                    <!-- Expiry Info -->
                    @if($transaction->expiry_date)
                    <div class="expiry-box">
                        <div class="expiry-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                        <div class="expiry-text">
                            <strong>Masa Berlaku: 7 Hari</strong>
                            <span>Berakhir pada: {{ $transaction->formatted_expiry_date }}</span>
                        </div>
                    </div>
                    @endif

                    <!-- Drive Button -->
                    <a href="{{ $transaction->drive_link }}" target="_blank" class="btn-drive">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                            <polyline points="15 3 21 3 21 9"></polyline>
                            <line x1="10" y1="14" x2="21" y2="3"></line>
                        </svg>
                        Buka Google Drive
                    </a>

                    <!-- Info Note -->
                    <div class="info-note">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="16" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                        </svg>
                        <p>Pastikan Anda sudah login dengan akun Google yang terdaftar. File akan otomatis terhapus setelah masa berlaku habis.</p>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <div class="clouds"></div>
    </div>
</x-layout>