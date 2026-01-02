<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bumantara Studio - Jadwalkan Layanan Anda</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            line-height: 1.6;
            background: #f8f9fa;
        }

        /* Page Header */
        .page-header {
            text-align: center;
            padding: 3rem 6% 2rem;
            background: white;
        }

        .page-header h1 {
            font-size: 2.2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.8rem;
        }

        .page-subtitle {
            font-size: 0.9rem;
            color: #7f8c8d;
            font-weight: 400;
        }

        /* Booking Container */
        .booking-container {
            max-width: 1200px;
            margin: 3rem auto;
            padding: 0 6%;
            display: grid;
            grid-template-columns: 350px 1fr 350px;
            gap: 2rem;
        }

        /* Package Card Left */
        .package-info {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            height: fit-content;
        }

        .package-image {
            width: 100%;
            height: 280px;
            background: linear-gradient(135deg, #e3f2fd 0%, #90caf9 100%);
            border-radius: 12px;
            margin-bottom: 1.5rem;
            object-fit: cover;
        }

        .package-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 1.5rem;
        }

        .package-features {
            list-style: none;
        }

        .package-features li {
            font-size: 0.85rem;
            color: #5a6c7d;
            padding: 0.6rem 0;
            padding-left: 1.8rem;
            position: relative;
        }

        .package-features li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #1e4d6b;
            font-weight: bold;
            font-size: 1rem;
        }

        /* Calendar Section */
        .calendar-section {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .calendar-header {
            margin-bottom: 1.5rem;
        }

        .calendar-header h2 {
            font-size: 1.2rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .month-year {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .month-year-display {
            font-size: 1rem;
            font-weight: 600;
            color: #2c3e50;
            min-width: 150px;
            text-align: center;
        }

        .nav-arrow {
            width: 32px;
            height: 32px;
            border: 1px solid #ddd;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 1.2rem;
            color: #2c3e50;
        }

        .nav-arrow:hover {
            background: #e3f2fd;
            border-color: #90caf9;
        }

        .weekdays {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .weekday {
            text-align: center;
            font-size: 0.85rem;
            font-weight: 600;
            color: #7f8c8d;
            padding: 0.5rem;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 0.5rem;
            margin-bottom: 2rem;
        }

        .calendar-day {
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            color: #2c3e50;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            border: 1px solid transparent;
        }

        .calendar-day:hover {
            background: #e3f2fd;
            border-color: #90caf9;
        }

        .calendar-day.selected {
            background: #1e4d6b;
            color: white;
            font-weight: 600;
        }

        .calendar-day.disabled {
            color: #bdc3c7;
            cursor: not-allowed;
        }

        .calendar-day.disabled:hover {
            background: transparent;
            border-color: transparent;
        }

        /* Timezone */
        .timezone-selector {
            margin-bottom: 2rem;
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
        }

        .timezone-selector label {
            font-size: 0.85rem;
            color: #7f8c8d;
            margin-bottom: 0.5rem;
            display: block;
        }

        .timezone-selector select {
            width: 100%;
            padding: 0.7rem 1rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 0.9rem;
            font-family: 'Poppins', sans-serif;
            color: #2c3e50;
        }

        /* Time Slots */
        .time-slots-container {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
        }
        
        .time-slots {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.8rem;
        }

        .time-slot {
            padding: 0.7rem;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 0.85rem;
            color: #2c3e50;
            cursor: pointer;
            transition: all 0.3s;
            background: white;
        }

        .time-slot:hover {
            border-color: #1e4d6b;
            background: #e3f2fd;
        }

        .time-slot.selected {
            background: #1e4d6b;
            color: white;
            border-color: #1e4d6b;
        }

        .time-slot.disabled {
            background: #f5f5f5;
            color: #bdc3c7;
            text-decoration: line-through;
            cursor: not-allowed;
        }

        .time-slot.disabled:hover {
            border-color: #ddd;
            background: #f5f5f5;
        }

        /* Summary Card Right */
        .summary-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            height: fit-content;
        }

        .summary-section {
            margin-bottom: 1.5rem;
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
        }

        .summary-section h3 {
            font-size: 0.95rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.8rem;
        }

        .summary-item {
            display: flex;
            align-items: flex-start;
            gap: 0.8rem;
            margin-bottom: 1rem;
        }

        .summary-icon {
            width: 35px;
            height: 35px;
            background: #e3f2fd;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 1rem;
        }

        .summary-text {
            flex: 1;
        }

        .summary-label {
            font-size: 0.75rem;
            color: #7f8c8d;
            margin-bottom: 0.2rem;
        }

        .summary-value {
            font-size: 0.9rem;
            color: #2c3e50;
            font-weight: 500;
        }

        .extra-time-info {
            font-size: 0.75rem;
            color: #7f8c8d;
            margin-top: 0.3rem;
        }

        .countdown {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin: 1rem 0;
        }

        .countdown-item {
            text-align: center;
        }

        .countdown-number {
            width: 35px;
            height: 35px;
            background: #1e4d6b;
            color: white;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .countdown-label {
            font-size: 0.7rem;
            color: #7f8c8d;
            margin-top: 0.3rem;
        }

        .selected-datetime {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            text-align: center;
        }

        .datetime-row {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            margin-bottom: 0.5rem;
        }

        .datetime-row:last-child {
            margin-bottom: 0;
        }

        .datetime-icon {
            font-size: 1rem;
        }

        .datetime-text {
            font-size: 0.85rem;
            color: #2c3e50;
            font-weight: 500;
        }

        .price-section {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
        }

        .price-label {
            font-size: 0.85rem;
            color: #7f8c8d;
            margin-bottom: 0.5rem;
        }

        .price-value {
            font-size: 1.5rem;
            color: #1e4d6b;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .checkout-btn {
            width: 100%;
            background: #1e4d6b;
            color: white;
            padding: 0.9rem;
            border: none;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
            font-family: 'Poppins', sans-serif;
        }

        .checkout-btn:hover {
            background: #163d54;
        }

        @media (max-width: 1024px) {
            .booking-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
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
                <label>Zona waktu: Waktu Indonesia Barat (WIB)</label>
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
                <button class="checkout-btn">Selanjutnya</button>
            </div>
        </div>
    </div>

    <script>
        let currentMonth = 11; // December
        let currentYear = 2025;
        
        const monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                           'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        // Generate Calendar
        function generateCalendar(month, year) {
            const grid = document.getElementById('calendarGrid');
            const display = document.getElementById('monthYearDisplay');
            
            grid.innerHTML = '';
            display.textContent = `${monthNames[month]} ${year}`;
            
            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            
            // Empty cells before first day
            for (let i = 0; i < firstDay; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.className = 'calendar-day disabled';
                grid.appendChild(emptyDay);
            }
            
            // Days of month
            for (let day = 1; day <= daysInMonth; day++) {
                const dayCell = document.createElement('div');
                dayCell.className = 'calendar-day';
                dayCell.textContent = day;
                
                if (day === 8) {
                    dayCell.classList.add('selected');
                }
                
                dayCell.addEventListener('click', function() {
                    document.querySelectorAll('.calendar-day').forEach(d => d.classList.remove('selected'));
                    this.classList.add('selected');
                });
                
                grid.appendChild(dayCell);
            }
        }

        // Generate Time Slots
        function generateTimeSlots() {
            const slots = document.getElementById('timeSlots');
            const times = [
                '13.30', '14.00', '14.00',
                '14.30', '14.00', '15.00',
                '15.30', '16.00', '16.00',
                '16.30', '17.00', '17.00',
                '17.30', '18.00', '18.00'
            ];
            
            const disabledIndexes = [2, 4, 6];
            
            times.forEach((time, index) => {
                const slot = document.createElement('div');
                slot.className = 'time-slot';
                slot.textContent = time;
                
                if (disabledIndexes.includes(index)) {
                    slot.classList.add('disabled');
                } else if (index === 1) {
                    slot.classList.add('selected');
                }
                
                if (!slot.classList.contains('disabled')) {
                    slot.addEventListener('click', function() {
                        document.querySelectorAll('.time-slot').forEach(s => s.classList.remove('selected'));
                        this.classList.add('selected');
                    });
                }
                
                slots.appendChild(slot);
            });
        }

        // Navigation arrows
        document.getElementById('prevMonth').addEventListener('click', function() {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            generateCalendar(currentMonth, currentYear);
        });

        document.getElementById('nextMonth').addEventListener('click', function() {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            generateCalendar(currentMonth, currentYear);
        });

        // Initialize
        generateCalendar(currentMonth, currentYear);
        generateTimeSlots();
    </script>
</body>
</html>