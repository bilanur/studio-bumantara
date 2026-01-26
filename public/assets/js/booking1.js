// ============================================
// BOOKING 1 - PILIH TANGGAL & WAKTU
// Version: Form Submit
// ============================================

let currentMonth = 11;
let currentYear = 2025;
let selectedDate = null;
let selectedTime = null;
let extraPeopleCount = 0;
let selectedZone = 'WIB';
let packagePrice = 0;

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
    generateTimeSlots();
    initEventListeners();
});

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
            if (!selectedDate) {
                dayCell.classList.add('selected');
                selectedDate = dayDate;
                updateSelectedDateTime();
            }
            
            dayCell.addEventListener('click', function() {
                if (!this.classList.contains('disabled')) {
                    document.querySelectorAll('.calendar-day').forEach(d => d.classList.remove('selected'));
                    this.classList.add('selected');
                    selectedDate = new Date(year, month, day);
                    updateSelectedDateTime();
                }
            });
        }
        
        grid.appendChild(dayCell);
    }
}

// ============================================
// GENERATE TIME SLOTS
// ============================================
function generateTimeSlots() {
    const slots = document.getElementById('timeSlots');
    if (!slots) return;
    
    slots.innerHTML = '';
    
    const times = [
        '09:00', '09:30', '10:00', '10:30', '11:00', '11:30',
        '12:00', '12:30', '13:00', '13:30', '14:00', '14:30',
        '15:00', '15:30', '16:00', '16:30', '17:00', '17:30'
    ];
    
    times.forEach((time, index) => {
        const slot = document.createElement('div');
        slot.className = 'time-slot';
        slot.textContent = time;
        slot.dataset.time = time;
        
        if (index === 0 && !selectedTime) {
            slot.classList.add('selected');
            selectedTime = time;
            updateSelectedDateTime();
        }
        
        slot.addEventListener('click', function() {
            if (!this.classList.contains('disabled')) {
                document.querySelectorAll('.time-slot').forEach(s => s.classList.remove('selected'));
                this.classList.add('selected');
                selectedTime = this.dataset.time;
                updateSelectedDateTime();
                console.log('⏰ Selected time:', selectedTime);
            }
        });
        
        slots.appendChild(slot);
    });
}

// ============================================
// EVENT LISTENERS
// ============================================
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
        console.log('🌍 Selected zone:', selectedZone);
    });

    // FORM SUBMIT
    const bookingForm = document.getElementById('bookingForm');
    if (bookingForm) {
        bookingForm.addEventListener('submit', function(e) {
            e.preventDefault(); // Stop default submit
            
            console.log('📝 Form submit triggered');
            
            // Validasi
            if (!selectedDate) {
                alert('⚠️ Silakan pilih TANGGAL terlebih dahulu!');
                return false;
            }

            if (!selectedTime) {
                alert('⚠️ Silakan pilih WAKTU terlebih dahulu!');
                return false;
            }

            // Format tanggal
            const formattedDate = selectedDate.toISOString().split('T')[0];
            
            // Update hidden inputs
            document.getElementById('hiddenDate').value = formattedDate;
            document.getElementById('hiddenTime').value = selectedTime;
            document.getElementById('hiddenExtra').value = extraPeopleCount;
            document.getElementById('hiddenZone').value = selectedZone;

            // Log data
            console.log('📦 Form data:', {
                package_id: document.querySelector('input[name="package_id"]').value,
                tanggal: formattedDate,
                waktu: selectedTime,
                extra_people: extraPeopleCount,
                zona_waktu: selectedZone
            });

            // Submit form
            console.log('🚀 Submitting form...');
            this.submit();
        });
        
        console.log('✅ Form listener attached');
    }
}

// ============================================
// UPDATE DISPLAY
// ============================================
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