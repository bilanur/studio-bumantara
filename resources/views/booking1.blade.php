@php($title = 'Booking | Bumantara Studio')

@php
    $package = $package ?? null;
@endphp

@push('styles')
<link href="{{ asset('assets/css/booking1.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/booking1.js') }}" defer></script>
@endpush

<x-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                <img src="{{ asset('assets/images/j.jpeg') }}" alt="{{ $package->name ?? 'Package' }}">
            </div>
            <h3 class="package-title">{{ $package->name ?? 'Package Name' }}</h3>
            <ul class="package-features">
                <li>{{ $package->max_people ?? 0 }} person(s)</li>
                <li>{{ $package->duration ?? 0 }} mins photo session</li>
                @if($package && $package->description)
                    @foreach (explode("\n", $package->description) as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                @endif
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
                        <span class="datetime-text" id="selectedDateTime">Pilih tanggal dan waktu</span>
                    </div>
                </div>
                <div class="price-row">
                    <span class="price-label">Harga paket</span>
                    <span class="price-value" id="packagePrice" data-price="{{ $package->price ?? 0 }}">
                        Rp {{ number_format($package->price ?? 0, 0, ',', '.') }}
                    </span>
                </div>
                
                <form action="{{ route('booking2') }}" method="GET" id="bookingForm">
                    <input type="hidden" name="package_id" value="{{ $package->id ?? '' }}">
                    <input type="hidden" name="tanggal" id="hiddenDate" value="">
                    <input type="hidden" name="waktu" id="hiddenTime" value="">
                    <input type="hidden" name="extra_people" id="hiddenExtra" value="0">
                    <input type="hidden" name="zona_waktu" id="hiddenZone" value="WIB">
                    
                    <button type="submit" class="checkout-btn">Selanjutnya</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>