@php($title = 'Booking3 | Bumantara Studio')

@push('styles')
<link href="{{ asset('assets/css/booking2.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/booking3.js') }}" defer></script>
@endpush

<x-layout>
    
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
                        <img src="https://via.placeholder.com/90x90/e8f0f7/2a4962?text=Photo" alt="Order" class="order-image">
                        <div class="order-details">
                            <h3>Foto Keluarga</h3>
                            <div class="order-meta">
                                <div class="order-meta-item">
                                    <svg viewBox="0 0 24 24" style="width: 16px; height: 16px; stroke: #64748b; stroke-width: 2; fill: none;">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                    19 Desember 2025 | 11:30
                                </div>
                                <div class="order-meta-item">
                                    <svg viewBox="0 0 24 24" style="width: 16px; height: 16px; stroke: #64748b; stroke-width: 2; fill: none;">
                                        <line x1="12" y1="1" x2="12" y2="23"></line>
                                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                    </svg>
                                    Harga: Rp 80.000
                                </div>
                                <div class="order-meta-item">
                                    <svg viewBox="0 0 24 24" style="width: 16px; height: 16px; stroke: #64748b; stroke-width: 2; fill: none;">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg>
                                    Durasi: 15 menit
                                </div>
                                <div class="order-meta-item">
                                    <svg viewBox="0 0 24 24" style="width: 16px; height: 16px; stroke: #64748b; stroke-width: 2; fill: none;">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                    Extra people: 1 - 20.000
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
    <input type="text" class="form-input" placeholder="Masukkan nama lengkap">
</div>

<div class="form-row">
    <div class="form-group">
        <label class="form-label">Nomor Telepon*</label>
        <input type="tel" class="form-input" placeholder="821-1234-5678">
    </div>

    <div class="form-group">
        <label class="form-label">Email*</label>
        <input type="email" class="form-input" placeholder="email@example.com">
    </div>
</div>

                    <div class="form-group">
                        <label class="form-label">Apakah boleh foto Kakak untuk Minkit upload di sosial media?*</label>
                        <select class="form-input form-select">
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
                        <div class="payment-option selected">
                            <span class="payment-name">QRIS</span>
                        </div>
                        <div class="payment-option">
                            <span class="payment-name">BCA</span>
                        </div>
                        <div class="payment-option">
                            <span class="payment-name">BNI</span>
                        </div>
                        <div class="payment-option">
                            <span class="payment-name">DANA</span>
                        </div>
                        <div class="payment-option">
                            <span class="payment-name">BANK BRI</span>
                        </div>
                        <div class="payment-option">
                            <span class="payment-name">Mandiri</span>
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
                            <span class="summary-label">Couple Self Photo Session</span>
                            <span class="summary-value">Rp 80.000</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label">Extra People (1 orang)</span>
                            <span class="summary-value">Rp 20.000</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label">Add-ons</span>
                            <span class="summary-value">Rp 0</span>
                        </div>
                    </div>

                    <!-- Promo -->
                    <div class="promo-section">
                        <input type="text" class="form-input promo-input" placeholder="Masukkan kode promo">
                        <button class="apply-btn">Apply</button>
                    </div>

                    <!-- Total -->
                    <div class="total-section">
                        <div class="total-row">
                            <span class="total-label">Total Pembayaran</span>
                            <span class="total-amount">Rp 100.000</span>
                        </div>

                        <a href="{{ route('booking4') }}" class="payment-btn">Selanjutnya</a>
                        <p class="payment-note">* Pastikan data sudah benar sebelum melanjutkan pembayaran</p>
                        <p class="cancel-note">
                            <a href="#" class="cancel-link">Cancel</a> = Tidak Dapat Refund
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>    