@php($title = 'Konfirmasi Booking | Bumantara Studio')

@push('styles')
<link href="{{ asset('assets/css/booking2.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/bookingg.js') }}" defer></script>
@endpush

<x-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <div class="container">
        <div class="checkout-grid">
            <!-- Left Column -->
            <div class="left-column">
                <!-- Detail Paket -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="3" y1="9" x2="21" y2="9"></line>
                                <line x1="9" y1="21" x2="9" y2="9"></line>
                            </svg>
                        </div>
                        <h2 class="card-title">Detail Paket</h2>
                    </div>
                    <div class="order-item">
                        <img src="{{ asset('assets/images/j.jpeg') }}" alt="{{ $package->name }}" class="order-image">
                        <div class="order-details">
                            <h3>{{ $package->name }}</h3>
                            <div class="order-meta">
                                <div class="order-meta-item">
                                    <svg viewBox="0 0 24 24" style="width: 16px; height: 16px; stroke: #64748b; stroke-width: 2; fill: none;">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                    {{ $tanggalFormatted }} | {{ $waktu }}
                                </div>
                                <div class="order-meta-item">
                                    <svg viewBox="0 0 24 24" style="width: 16px; height: 16px; stroke: #64748b; stroke-width: 2; fill: none;">
                                        <line x1="12" y1="1" x2="12" y2="23"></line>
                                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                    </svg>
                                    Harga: Rp {{ number_format($hargaPaket, 0, ',', '.') }}
                                </div>
                                <div class="order-meta-item">
                                    <svg viewBox="0 0 24 24" style="width: 16px; height: 16px; stroke: #64748b; stroke-width: 2; fill: none;">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg>
                                    Durasi: {{ $package->duration }} menit
                                </div>
                                <div class="order-meta-item">
                                    <svg viewBox="0 0 24 24" style="width: 16px; height: 16px; stroke: #64748b; stroke-width: 2; fill: none;">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                    Extra people: {{ $extraPeople }} - Rp {{ number_format($hargaExtra, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Detail Customer -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <h2 class="card-title">Detail Customer</h2>
                    </div>
                    <p class="form-subtitle">Masukkan data lengkap kamu</p>
                    
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" id="namaLengkap" class="form-input" placeholder="Masukkan nama lengkap">
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Nomor Telepon*</label>
                            <input type="tel" id="nomorTelepon" class="form-input" placeholder="821-1234-5678">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Email*</label>
                            <input type="email" id="email" class="form-input" placeholder="email@example.com">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Apakah boleh foto Kakak untuk Minkit upload di sosial media?*</label>
                        <select id="sosialMedia" class="form-input form-select">
                            <option>Pilih opsi</option>
                            <option>Boleh</option>
                            <option>Tidak boleh</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="right-column">
                <!-- Payment Method Card -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                        </div>
                        <h2 class="card-title">Pilih Metode Pembayaran</h2>
                    </div>
                    
                    <div class="payment-grid">
                        <div class="payment-option" data-method="qris">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/2560px-QRIS_logo.svg.png" alt="QRIS" class="payment-logo">
                            <span class="payment-arrow">›</span>
                        </div>
                        <div class="payment-option" data-method="bca">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Bank_Central_Asia.svg/2560px-Bank_Central_Asia.svg.png" alt="BCA" class="payment-logo">
                            <span class="payment-arrow">›</span>
                        </div>
                        <div class="payment-option" data-method="dana">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Logo_dana_blue.svg/2560px-Logo_dana_blue.svg.png" alt="DANA" class="payment-logo">
                            <span class="payment-arrow">›</span>
                        </div>
                    </div>
                </div>

                <!-- Summary Card -->
                <div class="summary-card">
                    <div class="summary-header">
                        <h2 class="summary-title">Ringkasan Pembayaran</h2>
                    </div>

                    <!-- Summary Items -->
                    <div class="summary-items">
                        <div class="summary-item">
                            <span class="summary-label">{{ $package->name }}</span>
                            <span class="summary-value">Rp {{ number_format($hargaPaket, 0, ',', '.') }}</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label">Extra People ({{ $extraPeople }} orang)</span>
                            <span class="summary-value">Rp {{ number_format($hargaExtra, 0, ',', '.') }}</span>
                        </div>
                       <div class="summary-item">
    <span class="summary-label">Add-ons</span>
    <span class="summary-value">
        Rp {{ number_format($addonsTotal, 0, ',', '.') }}
    </span>
</div>

<div class="summary-item">
    <span class="summary-label">Voucher</span>
    <span class="summary-value text-danger">
        - Rp {{ number_format($voucherDiscount, 0, ',', '.') }}
    </span>
</div>

                    </div>

                    <!-- Promo -->
                    <div class="promo-section">
                        <input type="text" id="promoCode" class="form-input promo-input" placeholder="Masukkan kode promo">
                        <button class="apply-btn">Apply</button>
                    </div>

                    <!-- Total -->
                    <div class="total-section">
                        <div class="total-row">
                            <span class="total-label">Total Pembayaran</span>
                            <span class="total-amount">Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</span>
                        </div>

                        <button id="btnKonfirmasi" class="payment-btn">
                            <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" style="display: inline-block; vertical-align: middle; margin-right: 8px;">
                                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                            </svg>
                            Konfirmasi via WhatsApp
                        </button>
                        <p class="payment-note">* Anda akan diarahkan ke WhatsApp untuk konfirmasi pembayaran</p>
                        <p class="cancel-note">
                            <a href="#" class="cancel-link">Cancel</a> = Tidak Dapat Refund
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Detail Modal -->
    <div id="paymentModal" class="modal">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <button class="modal-close" onclick="closeModal()">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>

            <!-- QRIS Modal Content -->
            <div id="qris-modal" class="modal-detail" style="display: none;">
                <div class="modal-header">
                    <div class="modal-icon">💳</div>
                    <h2 class="modal-title">Pembayaran via QRIS</h2>
                </div>
                <div class="modal-body">
                    <div class="qr-code-container">
                        <img src="https://via.placeholder.com/250x250/e8f0f7/2a4962?text=QR+CODE" alt="QRIS" class="qr-code">
                    </div>
                    <div class="payment-instructions">
                        <h3>Cara Pembayaran:</h3>
                        <ol>
                            <li>Buka aplikasi e-wallet favorit kamu (DANA, OVO, GoPay, dll)</li>
                            <li>Pilih menu "Scan QR"</li>
                            <li>Scan QR Code di atas</li>
                            <li>Pastikan nominal pembayaran <strong>Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</strong></li>
                            <li>Konfirmasi pembayaran</li>
                        </ol>
                    </div>
                    <button class="modal-btn" onclick="closeModal()">Mengerti</button>
                </div>
            </div>

            <!-- BCA Modal Content -->
            <div id="bca-modal" class="modal-detail" style="display: none;">
                <div class="modal-header">
                    <div class="modal-icon">🏦</div>
                    <h2 class="modal-title">Transfer Bank BCA</h2>
                </div>
                <div class="modal-body">
                    <div class="account-detail-box">
                        <div class="account-detail-item">
                            <span class="account-detail-label">Nomor Rekening</span>
                            <div class="account-number-container">
                                <span class="account-number-large" id="bca-number">8180635182</span>
                                <button class="copy-btn-large" onclick="copyToClipboard('bca-number')">
                                    <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                    Salin
                                </button>
                            </div>
                        </div>
                        <div class="account-detail-item">
                            <span class="account-detail-label">Atas Nama</span>
                            <span class="account-name-large">An. Dewi Puspita sari</span>
                        </div>
                        <div class="account-detail-item">
                            <span class="account-detail-label">Jumlah Transfer</span>
                            <span class="amount-large">Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    <div class="payment-instructions">
                        <h3>Cara Pembayaran:</h3>
                        <ol>
                            <li>Transfer ke nomor rekening di atas</li>
                            <li>Pastikan nominal transfer <strong>tepat Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</strong></li>
                            <li>Simpan bukti transfer</li>
                            <li>Kirim bukti transfer via WhatsApp</li>
                        </ol>
                    </div>
                    <button class="modal-btn" onclick="closeModal()">Mengerti</button>
                </div>
            </div>

            <!-- DANA Modal Content -->
            <div id="dana-modal" class="modal-detail" style="display: none;">
                <div class="modal-header">
                    <div class="modal-icon">📱</div>
                    <h2 class="modal-title">Transfer DANA</h2>
                </div>
                <div class="modal-body">
                    <div class="account-detail-box">
                        <div class="account-detail-item">
                            <span class="account-detail-label">Nomor DANA</span>
                            <div class="account-number-container">
                                <span class="account-number-large" id="dana-number">082318776859</span>
                                <button class="copy-btn-large" onclick="copyToClipboard('dana-number')">
                                    <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                    Salin
                                </button>
                            </div>
                        </div>
                        <div class="account-detail-item">
                            <span class="account-detail-label">Atas Nama</span>
                            <span class="account-name-large">An. Dewi Puspita sari</span>
                        </div>
                        <div class="account-detail-item">
                            <span class="account-detail-label">Jumlah Transfer</span>
                            <span class="amount-large">Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    <div class="payment-instructions">
                        <h3>Cara Pembayaran:</h3>
                        <ol>
                            <li>Buka aplikasi DANA</li>
                            <li>Pilih menu "Kirim"</li>
                            <li>Masukkan nomor DANA di atas</li>
                            <li>Input nominal <strong>Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</strong></li>
                            <li>Konfirmasi dan selesaikan pembayaran</li>
                        </ol>
                    </div>
                    <button class="modal-btn" onclick="closeModal()">Mengerti</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmModal" class="modal">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <div class="modal-detail">
                <div class="modal-header">
                    <div class="modal-icon-confirm">✓</div>
                    <h2 class="modal-title">Konfirmasi Booking</h2>
                    <p class="modal-subtitle">Pastikan data Anda sudah benar</p>
                </div>
                <div class="modal-body">
                    <div class="confirm-summary-box">
                        <div class="confirm-item">
                            <span class="confirm-label">📸 Paket</span>
                            <span class="confirm-value" id="confirm-paket">{{ $package->name }}</span>
                        </div>
                        <div class="confirm-item">
                            <span class="confirm-label">📅 Tanggal & Waktu</span>
                            <span class="confirm-value" id="confirm-jadwal">{{ $tanggalFormatted }}, {{ $waktu }} {{ $zonaWaktu }}</span>
                        </div>
                        <div class="confirm-item">
                            <span class="confirm-label">👤 Nama</span>
                            <span class="confirm-value" id="confirm-nama">-</span>
                        </div>
                        <div class="confirm-item">
                            <span class="confirm-label">📱 No. Telepon</span>
                            <span class="confirm-value" id="confirm-telp">-</span>
                        </div>
                        <div class="confirm-item">
                            <span class="confirm-label">💳 Pembayaran</span>
                            <span class="confirm-value" id="confirm-payment">-</span>
                        </div>
                        <div class="confirm-item-total">
                            <span class="confirm-label-total">💰 Total Bayar</span>
                            <span class="confirm-value-total" id="confirm-total">Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    
                    <div class="confirm-actions">
                        <button class="btn-cancel" onclick="closeConfirmModal()">
                            Cek Lagi
                        </button>
                        <button class="btn-confirm" id="btnProceed">
                            <span class="btn-text">Ya, Lanjutkan</span>
                            <span class="btn-loading" style="display: none;">
                                <svg class="spinner" viewBox="0 0 24 24">
                                    <circle class="spinner-circle" cx="12" cy="12" r="10"></circle>
                                </svg>
                                Menyimpan...
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>