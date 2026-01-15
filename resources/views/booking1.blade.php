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
            <div class="package-image">
                <img src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?w=300&h=200&fit=crop" alt="Band">
            </div>
            <h3 class="package-title">Couple Self Photo Session</h3>
            <ul class="package-features">
                <li>2 person(s)</li>
                <li>15 mins photo session</li>
                <li>Free 1 Print/ 2 Person</li>
                <li>Free All Soft File</li>
            </ul>
        </div>

        <div class="calendar-wrapper">

    <!-- CARD KALENDER -->
    <div class="calendar-section">
        <div class="calendar-header center-title">
            <h2>Pilih Tanggal dan Waktu</h2>
        </div>

        <div class="calendar-subheader">
            <div class="month-year">
                <button class="nav-arrow" id="prevMonth">&lt;</button>
                <div class="month-year-display" id="monthYearDisplay"></div>
                <button class="nav-arrow" id="nextMonth">&gt;</button>
            </div>
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

        <div class="calendar-grid" id="calendarGrid"></div>
    </div>

    <!-- CARD JAM -->
    <div class="calendar-section">

        <div class="timezone-selector">
            <select>
                <option selected>Zona waktu: WIB</option>
                <option>Zona waktu: WITA</option>
                <option>Zona waktu: WIT</option>
            </select>
        </div>

        <div class="time-slots" id="timeSlots"></div>
    </div>

</div>


        <!-- Right: Summary Card -->
        <div class="summary-card">
            <!-- Extra People Card -->
            <div class="summary-section">
                <h3>Tambah Orang</h3>
                <div class="summary-item">
                    <div class="summary-icon">👥</div>
                    <div class="summary-text">
                        <div class="summary-label">Rp 25.000/1 orang</div>
                        <div class="summary-value">Penambahan Satu Orang</div>
                    </div>
                </div>
                <div class="counter-controls">
                    <button class="counter-btn minus" id="decreaseBtn">-</button>
                    <div class="counter-display" id="counterDisplay">0</div>
                    <button class="counter-btn plus" id="increaseBtn">+</button>
                </div>
            </div>

            <!-- Selected DateTime & Price Section -->
            <div class="summary-section">
                <h3>Tanggal dan waktu yang dipilih</h3>
                <div class="selected-datetime">
                    <div class="datetime-row">
                        <span class="datetime-icon">📅</span>
                        <span class="datetime-text" id="selectedDateTime">8 Desember 2025 <span class="time">| 14.00</span></span>
                    </div>
                </div>
                <div class="price-row">
                    <span class="price-label">Harga paket</span>
                    <span class="price-value">Rp 80.000</span>
                </div>
                {{-- <button class="checkout-btn">Selanjutnya</button> --}}
                <a href="{{ route('booking2') }}" class="checkout-btn">Selanjutnya</a>
            </div>
        </div>
    </div>

</x-layout>