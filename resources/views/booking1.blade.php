@php($title = 'Booking | Bumantara Studio')

@push('styles')
<link href="{{ asset('assets/css/booking1.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/booking1.js') }}" defer></script>
@endpush

<x-layout>

    <!-- Page Header -->
    <section class="page-header">
        <h1>Jadwalkan Layanan Anda</h1>
        <p class="page-subtitle">Check Out Ketersediaan Kami Serta Pesan Tanggal Dan Waktu Yang Cocok Dengan Anda</p>
    </section>

    <!-- Booking Container -->
    <div class="booking-container">
        <!-- Left: Package Info -->
        <div class="package-info">
            <img src="path/ke/couple-photo.jpg" alt="Couple Self Photo Session" class="package-image">
            <h3 class="package-title">Couple Self Photo Session</h3>
            <ul class="package-features">
                <li>2 person(s)</li>
                <li>15 mins photo session</li>
                <li>Free 1 Print/ 2 Person</li>
                <li>Free All Soft File</li>
            </ul>
        </div>

        <!-- Center: Calendar & Time Slots -->
        <div class="calendar-section">
            <div class="calendar-header">
                <h2>Pilih Tanggal dan Waktu</h2>
                
                <div class="month-year">
                    <div class="nav-arrow" id="prevMonth">&lt;</div>
                    <div class="month-year-display" id="monthYearDisplay">Desember 2025</div>
                    <div class="nav-arrow" id="nextMonth">&gt;</div>
                </div>

                <div class="weekdays">
                    <div class="weekday">Min</div>
                    <div class="weekday">Sen</div>
                    <div class="weekday">Sel</div>
                    <div class="weekday">Rab</div>
                    <div class="weekday">Kam</div>
                    <div class="weekday">Jum</div>
                    <div class="weekday">Sab</div>
                </div>

                <div class="calendar-grid" id="calendarGrid">
                    <!-- Calendar days will be generated here -->
                </div>
            </div>

            <div class="timezone-selector">
                <select>
                    <option selected>Zona waktu: Waktu Indonesia Barat (WIB)</option>
                    <option>Zona waktu: Waktu Indonesia Tengah (WITA)</option>
                    <option>Zona waktu: Waktu Indonesia Timur (WIT)</option>
                </select>
            </div>

            <div class="time-slots-container">
                <div class="time-slots" id="timeSlots">
                    <!-- Time slots will be generated here -->
                </div>
            </div>
        </div>

        <!-- Right: Summary Card -->
        <div class="summary-card">
            <div class="summary-section">
                <h3>Extra Orang / People</h3>
                <div class="summary-item">
                    <div class="summary-icon">👥</div>
                    <div class="summary-text">
                        <div class="summary-label">Rp 20.000 / orang</div>
                        <div class="summary-value">Penambahan orang selama 7 menit</div>
                        <div class="countdown">
                            <div class="countdown-item">
                                <div class="countdown-number">0</div>
                                <div class="countdown-label">orang</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="summary-section">
                <h3>Tanggal dan waktu yang dipilih</h3>
                <div class="selected-datetime">
                    <div class="datetime-row">
                        <span class="datetime-icon">📅</span>
                        <span class="datetime-text">8 Desember 2025 | 14.00</span>
                    </div>
                </div>
            </div>

            <div class="price-section">
                <div class="price-label">Harga paket</div>
                <div class="price-value">Rp 80.000</div>
                 <a href="{{ route('booking2') }}" button class="checkout-btn" class="booking-btn">
                  Selanjutnya
                 </a>
                {{-- <button class="checkout-btn">Selanjutnya</button> --}}
            </div>
        </div>
    </div>

</x-layout>