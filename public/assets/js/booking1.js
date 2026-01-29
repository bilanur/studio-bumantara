// ============================================
// BOOKING 1 - PILIH TANGGAL & WAKTU
// Version: Dynamic Time Slots from Database
// ============================================

let currentMonth = 11;
let currentYear = 2025;
let selectedDate = null;
let selectedTime = null;
let extraPeopleCount = 0;
let selectedZone = 'WIB';
let packagePrice = 0;
let availableTimeSlots = []; // Menyimpan data dari API

const monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                   'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

// ============================================
// INIT
// ============================================
document.addEventListener('DOMContentLoaded', function() {
    console.log('✅ Booking1 JS loaded');
    
    const priceElement = document.getElementById('packagePrice');
    if (priceElement) {
        packagePrice = parseInt(priceElement.dataset.price) || 80000;
    }

    const now = new Date();
    currentMonth = now.getMonth();
    currentYear = now.getFullYear();

    generateCalendar(currentMonth, currentYear);
    initEventListeners();
    
    // Load time slots dari database
    loadTimeSlots();
});

// ============================================
// LOAD TIME SLOTS DARI DATABASE - INI YANG PENTING!
// ============================================
async function loadTimeSlots(date = null) {
    const slots = document.getElementById('timeSlots');
    if (!slots) return;
    
    // Show loading
    slots.innerHTML = '<div style="padding: 20px; text-align: center; color: #6b7280;">Loading...</div>';
    
    try {
        // Format date untuk API
        const formattedDate = date ? date.toISOString().split('T')[0] : '';
        
        // Call API - PASTIKAN ROUTE INI ADA!
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
            slots.innerHTML = '<div style="padding: 20px; text-align: center; color: #dc2626;">Gagal memuat jam booking</div>';
        }
        
    } catch (error) {
        console.error('❌ Error loading time slots:', error);
        slots.innerHTML = '<div style="padding: 20px; text-align: center; color: #dc2626;">Error: ' + error.message + '</div>';
    }
}

// ============================================
// RENDER TIME SLOTS - YANG INI JUGA PENTING!
// ============================================
function renderTimeSlots() {
    const slots = document.getElementById('timeSlots');
    if (!slots) return;
    
    slots.innerHTML = '';
    
    if (availableTimeSlots.length === 0) {
        slots.innerHTML = '<div style="padding: 20px; text-align: center; color: #6b7280;">Belum ada jam booking. Hubungi admin.</div>';
        return;
    }
    
    availableTimeSlots.forEach((timeSlot, index) => {
        const slot = document.createElement('div');
        slot.className = 'time-slot';
        slot.textContent = timeSlot.time;
        slot.dataset.time = timeSlot.time;
        
        // JIKA JAM SUDAH DIBOOKING - DISABLE DAN SILANG
        if (timeSlot.is_booked || !timeSlot.available) {
            slot.style.background = '#fee2e2';
            slot.style.color = '#991b1b';
            slot.style.textDecoration = 'line-through';
            slot.style.opacity = '0.6';
            slot.style.cursor = 'not-allowed';
            slot.title = 'Jam ini sudah dibooking';
        } else {
            // Auto select first available
            if (index === 0 && !selectedTime) {
                slot.classList.add('selected');
                selectedTime = timeSlot.time;
                updateSelectedDateTime();
            }
            
            // Click event
            slot.addEventListener('click', function() {
                document.querySelectorAll('.time-slot').forEach(s => s.classList.remove('selected'));
                this.classList.add('selected');
                selectedTime = this.dataset.time;
                updateSelectedDateTime();
            });
        }
        
        slots.appendChild(slot);
    });
}

// ============================================
// SISANYA SAMA SEPERTI SEBELUMNYA
// ============================================
function generateCalendar(month, year) {
    const grid = document.getElementById('calendarGrid');
    const display = document.getElementById('monthYearDisplay');
    
    if (!grid || !display) return;
    
    grid.innerHTML = '';
    display.textContent = `${monthNames[month]} ${year}`;
    
    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    
    for (let i = 0; i < firstDay; i++) {
        const emptyDay = document.createElement('div');
        emptyDay.className = 'calendar-day disabled';
        grid.appendChild(emptyDay);
    }
    
    for (let day = 1; day <= daysInMonth; day++) {
        const dayCell = document.createElement('div');
        dayCell.className = 'calendar-day';
        dayCell.textContent = day;
        
        const dayDate = new Date(year, month, day);
        dayDate.setHours(0, 0, 0, 0);
        
        if (dayDate < today) {
            dayCell.classList.add('disabled');
        } else {
            if (!selectedDate && dayDate.getTime() === today.getTime()) {
                dayCell.classList.add('selected');
                selectedDate = dayDate;
                updateSelectedDateTime();
                loadTimeSlots(dayDate);
            }
            
            dayCell.addEventListener('click', function() {
                if (!this.classList.contains('disabled')) {
                    document.querySelectorAll('.calendar-day').forEach(d => d.classList.remove('selected'));
                    this.classList.add('selected');
                    selectedDate = new Date(year, month, day);
                    selectedTime = null;
                    updateSelectedDateTime();
                    loadTimeSlots(selectedDate); // RELOAD JAM UNTUK TANGGAL INI
                }
            });
        }
        
        grid.appendChild(dayCell);
    }
}

function initEventListeners() {
    document.getElementById('prevMonth')?.addEventListener('click', function() {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        generateCalendar(currentMonth, currentYear);
    });

    document.getElementById('nextMonth')?.addEventListener('click', function() {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        generateCalendar(currentMonth, currentYear);
    });

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

    document.querySelector('.timezone-selector select')?.addEventListener('change', (e) => {
        selectedZone = e.target.value.split(': ')[1] || 'WIB';
        if (selectedDate) {
            loadTimeSlots(selectedDate); // RELOAD JAM DENGAN ZONA BARU
        }
    });

    const bookingForm = document.getElementById('bookingForm');
    if (bookingForm) {
        bookingForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (!selectedDate) {
                alert('⚠️ Silakan pilih TANGGAL!');
                return false;
            }

            if (!selectedTime) {
                alert('⚠️ Silakan pilih WAKTU!');
                return false;
            }

            const formattedDate = selectedDate.toISOString().split('T')[0];
            
            document.getElementById('hiddenDate').value = formattedDate;
            document.getElementById('hiddenTime').value = selectedTime;
            document.getElementById('hiddenExtra').value = extraPeopleCount;
            document.getElementById('hiddenZone').value = selectedZone;

            this.submit();
        });
    }
}

function updateSelectedDateTime() {
    const display = document.getElementById('selectedDateTime');
    if (!display) return;
    
    if (selectedDate && selectedTime) {
        const day = selectedDate.getDate();
        const month = monthNames[selectedDate.getMonth()];
        const year = selectedDate.getFullYear();
        display.innerHTML = `${day} ${month} ${year} <span class="time">| ${selectedTime}</span>`;
    } else if (selectedDate) {
        const day = selectedDate.getDate();
        const month = monthNames[selectedDate.getMonth()];
        const year = selectedDate.getFullYear();
        display.innerHTML = `${day} ${month} ${year} <span class="time">| --:--</span>`;
    }
}

function updatePrice() {
    const priceElement = document.querySelector('.price-value');
    if (!priceElement) return;
    
    const extraPersonPrice = 25000;
    const totalPrice = packagePrice + (extraPeopleCount * extraPersonPrice);
    priceElement.textContent = 'Rp ' + totalPrice.toLocaleString('id-ID');
}