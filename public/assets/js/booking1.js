let currentMonth = 11;
let currentYear = 2025;
let selectedDate = null; // ✅ STRING: YYYY-MM-DD (BUKAN Date object!)
let selectedTime = null;
let extraPeopleCount = 0;
let selectedZone = 'WIB';
let packagePrice = 0;
let availableTimeSlots = [];

const monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                   'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

document.addEventListener('DOMContentLoaded', function() {
    console.log('✅ Booking1 JS loaded (Fixed Version)');
    
    const priceElement = document.getElementById('packagePrice');
    if (priceElement) {
        packagePrice = parseInt(priceElement.dataset.price) || 80000;
    }

    const now = new Date();
    currentMonth = now.getMonth();
    currentYear = now.getFullYear();

    generateCalendar(currentMonth, currentYear);
    initEventListeners();
    
    // ✅ FIX: Auto select today - simpan sebagai STRING
    const today = new Date();
    selectedDate = formatDateForAPI(today);
    loadTimeSlots(selectedDate);
});

async function loadTimeSlots(dateString = null) {
    const slots = document.getElementById('timeSlots');
    if (!slots) return;
    
    // Show loading
    slots.innerHTML = '<div style="padding: 20px; text-align: center; color: #6b7280;">⏳ Memuat jam tersedia...</div>';
    
    try {
        // ✅ FIX: dateString sudah dalam format YYYY-MM-DD
        const formattedDate = dateString || '';
        
        // Call API
        const url = `/api/available-times?date=${formattedDate}&timezone=${selectedZone}`;
        console.log('🔄 Fetching time slots from:', url);
        
        const response = await fetch(url, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        });
        
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const data = await response.json();
        console.log('✅ Time slots loaded:', data);
        
        if (data.success && data.time_slots) {
            availableTimeSlots = data.time_slots;
            renderTimeSlots();
        } else {
            slots.innerHTML = '<div style="padding: 20px; text-align: center; color: #dc2626;">❌ Gagal memuat jam booking</div>';
        }
        
    } catch (error) {
        console.error('❌ Error loading time slots:', error);
        slots.innerHTML = '<div style="padding: 20px; text-align: center; color: #dc2626;">Error: ' + error.message + '</div>';
    }
}

// ============================================
// RENDER TIME SLOTS - DENGAN CEK BOOKING
// ============================================
function renderTimeSlots() {
    const slots = document.getElementById('timeSlots');
    if (!slots) return;
    
    slots.innerHTML = '';
    
    if (availableTimeSlots.length === 0) {
        slots.innerHTML = '<div style="padding: 20px; text-align: center; color: #6b7280;">📅 Belum ada jam booking tersedia</div>';
        return;
    }
    
    let firstAvailable = null;
    
    availableTimeSlots.forEach((timeSlot) => {
        const slot = document.createElement('div');
        slot.className = 'time-slot';
        slot.dataset.time = timeSlot.time;
        
        // CEK APAKAH JAM INI SUDAH DIBOOKING
        if (timeSlot.is_booked || !timeSlot.available) {
            // JAM SUDAH DIBOOKING - DISABLE & BERI STYLE
            slot.classList.add('booked');
            slot.innerHTML = `<span style="text-decoration: line-through;">${timeSlot.time}</span> <span style="color: #dc2626; font-weight: bold;">✕</span>`;
            slot.style.backgroundColor = '#fee2e2';
            slot.style.color = '#991b1b';
            slot.style.opacity = '0.6';
            slot.style.cursor = 'not-allowed';
            slot.title = '❌ Jam ini sudah dibooking';
            
        } else {
            // JAM MASIH TERSEDIA
            slot.textContent = timeSlot.time;
            
            // Simpan jam tersedia pertama untuk auto-select
            if (!firstAvailable) {
                firstAvailable = timeSlot.time;
            }
            
            // Click event untuk jam yang tersedia
            slot.addEventListener('click', function() {
                // Remove previous selection
                document.querySelectorAll('.time-slot:not(.booked)').forEach(s => s.classList.remove('selected'));
                
                // Add selection
                this.classList.add('selected');
                selectedTime = this.dataset.time;
                updateSelectedDateTime();
            });
        }
        
        slots.appendChild(slot);
    });
    
    // Auto-select jam tersedia pertama jika belum ada yang dipilih
    if (firstAvailable && !selectedTime) {
        const firstSlot = slots.querySelector(`[data-time="${firstAvailable}"]:not(.booked)`);
        if (firstSlot) {
            firstSlot.classList.add('selected');
            selectedTime = firstAvailable;
            updateSelectedDateTime();
        }
    }
}

// ============================================
// GENERATE CALENDAR
// ============================================
function generateCalendar(month, year) {
    const grid = document.getElementById('calendarGrid');
    const display = document.getElementById('monthYearDisplay');
    
    if (!grid || !display) return;
    
    grid.innerHTML = '';
    display.textContent = `${monthNames[month]} ${year}`;
    
    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    
    // ✅ FIX: Buat today string untuk perbandingan
    const today = new Date();
    const todayString = formatDateForAPI(today);
    
    // Empty cells sebelum tanggal 1
    for (let i = 0; i < firstDay; i++) {
        const emptyDay = document.createElement('div');
        emptyDay.className = 'calendar-day disabled';
        grid.appendChild(emptyDay);
    }
    
    // Generate tanggal
    for (let day = 1; day <= daysInMonth; day++) {
        const dayCell = document.createElement('div');
        dayCell.className = 'calendar-day';
        dayCell.textContent = day;
        
        // ✅ FIX: Buat date string untuk hari ini
        const dayString = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
        
        // Disable tanggal yang sudah lewat
        if (dayString < todayString) {
            dayCell.classList.add('disabled');
        } else {
            // Auto-select hari ini atau tanggal yang dipilih
            if (selectedDate && dayString === selectedDate) {
                dayCell.classList.add('selected');
            }
            
            // Click event
            dayCell.addEventListener('click', function() {
                if (!this.classList.contains('disabled')) {
                    // Remove previous selection
                    document.querySelectorAll('.calendar-day').forEach(d => d.classList.remove('selected'));
                    
                    // Add new selection
                    this.classList.add('selected');
                    
                    // ✅ FIX: Simpan sebagai STRING YYYY-MM-DD
                    selectedDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                    selectedTime = null; // Reset waktu saat ganti tanggal
                    
                    updateSelectedDateTime();
                    
                    // RELOAD TIME SLOTS UNTUK TANGGAL BARU
                    loadTimeSlots(selectedDate);
                }
            });
        }
        
        grid.appendChild(dayCell);
    }
}

function initEventListeners() {
    // Previous month
    document.getElementById('prevMonth')?.addEventListener('click', function() {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        generateCalendar(currentMonth, currentYear);
    });

    // Next month
    document.getElementById('nextMonth')?.addEventListener('click', function() {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        generateCalendar(currentMonth, currentYear);
    });

    // Extra people counter
    document.getElementById('decreaseBtn')?.addEventListener('click', function() {
        if (extraPeopleCount > 0) {
            extraPeopleCount--;
            document.getElementById('counterDisplay').textContent = extraPeopleCount;
            updatePrice();
        }
    });

    document.getElementById('increaseBtn')?.addEventListener('click', function() {
        if (extraPeopleCount < 10) {
            extraPeopleCount++;
            document.getElementById('counterDisplay').textContent = extraPeopleCount;
            updatePrice();
        }
    });

    // Timezone selector (jika ada)
    const timezoneSelect = document.querySelector('.timezone-selector select');
    if (timezoneSelect) {
        timezoneSelect.addEventListener('change', (e) => {
            selectedZone = e.target.value.split(': ')[1] || 'WIB';
            if (selectedDate) {
                loadTimeSlots(selectedDate);
            }
        });
    }

    // Form submit
    const bookingForm = document.getElementById('bookingForm');
    if (bookingForm) {
        bookingForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validasi
            if (!selectedDate) {
                alert('⚠️ Silakan pilih TANGGAL terlebih dahulu!');
                return false;
            }

            if (!selectedTime) {
                alert('⚠️ Silakan pilih WAKTU terlebih dahulu!');
                return false;
            }

            // ✅ FIX: selectedDate sudah STRING YYYY-MM-DD, langsung pakai
            document.getElementById('hiddenDate').value = selectedDate;
            document.getElementById('hiddenTime').value = selectedTime;
            document.getElementById('hiddenExtra').value = extraPeopleCount;
            document.getElementById('hiddenZone').value = selectedZone;

            console.log('📤 Submitting booking:', {
                date: selectedDate,
                time: selectedTime,
                extra: extraPeopleCount,
                zone: selectedZone
            });

            // Submit form
            this.submit();
        });
    }
}

function updateSelectedDateTime() {
    const display = document.getElementById('selectedDateTime');
    if (!display) return;
    
    if (selectedDate && selectedTime) {
        // ✅ FIX: Parse dari STRING YYYY-MM-DD
        const [year, month, day] = selectedDate.split('-');
        const monthName = monthNames[parseInt(month) - 1];
        display.innerHTML = `${parseInt(day)} ${monthName} ${year} <span class="time">| ${selectedTime} ${selectedZone}</span>`;
    } else if (selectedDate) {
        const [year, month, day] = selectedDate.split('-');
        const monthName = monthNames[parseInt(month) - 1];
        display.innerHTML = `${parseInt(day)} ${monthName} ${year} <span class="time">| Pilih waktu</span>`;
    } else {
        display.innerHTML = 'Pilih tanggal dan waktu';
    }
}

function updatePrice() {
    const priceElement = document.querySelector('.price-value');
    if (!priceElement) return;
    
    const extraPersonPrice = 25000;
    const totalPrice = packagePrice + (extraPeopleCount * extraPersonPrice);
    priceElement.textContent = 'Rp ' + totalPrice.toLocaleString('id-ID');
}

function formatDateForAPI(date) {
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
}