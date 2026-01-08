        // Sidebar menu interaction
        const sidebarItems = document.querySelectorAll('.sidebar-item');
        
        sidebarItems.forEach(item => {
            item.addEventListener('click', function() {
                sidebarItems.forEach(i => i.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Status button interaction
        const statusButtons = document.querySelectorAll('.status-btn');
        
        statusButtons.forEach(button => {
            button.addEventListener('click', function() {
                if (this.classList.contains('pending')) {
                    alert('Mengarahkan ke halaman pembayaran...');
                } else if (this.classList.contains('completed')) {
                    alert('Pesanan telah selesai!');
                }
            });
        });
