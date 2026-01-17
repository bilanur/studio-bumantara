        function showModal(isSuccess, message) {
            const modal = document.getElementById('customModal');
            const modalIcon = document.getElementById('modalIcon');
            const modalTitle = document.getElementById('modalTitle');
            const modalMessage = document.getElementById('modalMessage');

            if (isSuccess) {
                modalIcon.innerHTML = `
                    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none"/>
                        <path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                    </svg>
                `;
                modalTitle.textContent = 'Berhasil!';
            } else {
                modalIcon.innerHTML = `
                    <svg class="crossmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="crossmark-circle" cx="26" cy="26" r="25" fill="none"/>
                        <path class="crossmark-cross" fill="none" d="M16 16 36 36 M36 16 16 36"/>
                    </svg>
                `;
                modalTitle.textContent = 'Gagal!';
            }

            modalMessage.textContent = message;
            modal.style.display = 'flex';

            setTimeout(() => {
                modal.style.display = 'none';
            }, 2000);
        }

        function copyVA() {
            const vaNumber = '000000000000000000000';
            navigator.clipboard.writeText(vaNumber).then(() => {
                showModal(true, 'Nomor VA berhasil disalin!');
            }).catch(err => {
                console.error('Gagal menyalin:', err);
                showModal(false, 'Gagal menyalin nomor VA!');
            });
        }

        function handleFileSelect(event) {
            const file = event.target.files[0];
            if (file) {
                const uploadArea = document.querySelector('.upload-area');
                uploadArea.querySelector('.upload-text').textContent = `File dipilih: ${file.name}`;
            }
        }

        function sendProof() {
            const fileInput = document.getElementById('fileInput');
            if (fileInput.files.length === 0) {
                showModal(false, 'Silakan pilih file bukti pembayaran terlebih dahulu!');
                return;
            }
            showModal(true, 'Bukti pembayaran berhasil dikirim!');
        }
