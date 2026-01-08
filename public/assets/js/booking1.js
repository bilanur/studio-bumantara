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