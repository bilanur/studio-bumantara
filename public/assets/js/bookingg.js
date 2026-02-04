// ==========================================
// BOOKING 2 - KONFIRMASI & PEMBAYARAN
// With Alert Success & Redirect to WhatsApp
// ==========================================

let selectedMethod = null;

document.addEventListener('DOMContentLoaded', function() {
    initPaymentOptions();
    initMainButton();
});

// ==========================================
// PAYMENT METHOD SELECTION & MODAL
// ==========================================
function initPaymentOptions() {
    const paymentOptions = document.querySelectorAll('.payment-option');
    const paymentModal = document.getElementById('paymentModal');

    paymentOptions.forEach(option => {
        option.addEventListener('click', function() {
            paymentOptions.forEach(opt => opt.classList.remove('selected'));
            this.classList.add('selected');
            selectedMethod = this.getAttribute('data-method');
            openPaymentModal(selectedMethod);
        });
    });

    const paymentModalOverlay = paymentModal?.querySelector('.modal-overlay');
    if (paymentModalOverlay) {
        paymentModalOverlay.addEventListener('click', closeModal);
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (paymentModal?.classList.contains('active')) {
                closeModal();
            }
            if (document.getElementById('confirmModal')?.classList.contains('active')) {
                closeConfirmModal();
            }
        }
    });
}

// ==========================================
// PAYMENT MODAL FUNCTIONS
// ==========================================
window.openPaymentModal = function(method) {
    const paymentModal = document.getElementById('paymentModal');
    
    document.querySelectorAll('.modal-detail').forEach(detail => {
        detail.style.display = 'none';
    });
    
    const selectedModal = document.getElementById(`${method}-modal`);
    if (selectedModal) {
        selectedModal.style.display = 'block';
    }
    
    if (paymentModal) {
        paymentModal.classList.add('active');
        paymentModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
}

window.closeModal = function() {
    const paymentModal = document.getElementById('paymentModal');
    if (paymentModal) {
        paymentModal.classList.remove('active');
        paymentModal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
}

// ==========================================
// COPY TO CLIPBOARD
// ==========================================
window.copyToClipboard = function(elementId) {
    const element = document.getElementById(elementId);
    const text = element.textContent;
    
    const textarea = document.createElement('textarea');
    textarea.value = text;
    textarea.style.position = 'fixed';
    textarea.style.opacity = '0';
    document.body.appendChild(textarea);
    
    textarea.select();
    textarea.setSelectionRange(0, 99999);
    
    try {
        document.execCommand('copy');
        
        const button = event.target.closest('.copy-btn-large');
        const originalHTML = button.innerHTML;
        
        button.innerHTML = `
            <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none">
                <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
            Tersalin!
        `;
        button.style.background = '#10b981';
        
        setTimeout(() => {
            button.innerHTML = originalHTML;
            button.style.background = '#2B4D62';
        }, 2000);
        
    } catch (err) {
        console.error('Failed to copy:', err);
        alert('Gagal menyalin. Silakan salin manual.');
    }
    
    document.body.removeChild(textarea);
}

// ==========================================
// MAIN BUTTON
// ==========================================
function initMainButton() {
    const btnKonfirmasi = document.getElementById('btnKonfirmasi');
    if (btnKonfirmasi) {
        btnKonfirmasi.addEventListener('click', function(e) {
            e.preventDefault();
            openConfirmModal();
        });
    }
}

// ==========================================
// CONFIRMATION MODAL
// ==========================================
window.openConfirmModal = function() {
    const namaLengkap = document.getElementById('namaLengkap').value.trim();
    const nomorTelepon = document.getElementById('nomorTelepon').value.trim();
    const email = document.getElementById('email').value.trim();
    const sosialMedia = document.getElementById('sosialMedia').value;
    
    if (!namaLengkap) {
        alert('Mohon isi Nama Lengkap!');
        document.getElementById('namaLengkap').focus();
        return;
    }
    
    if (!nomorTelepon) {
        alert('Mohon isi Nomor Telepon!');
        document.getElementById('nomorTelepon').focus();
        return;
    }
    
    if (!email) {
        alert('Mohon isi Email!');
        document.getElementById('email').focus();
        return;
    }
    
    if (!email.includes('@')) {
        alert('Format email tidak valid!');
        document.getElementById('email').focus();
        return;
    }
    
    if (sosialMedia === 'Pilih opsi') {
        alert('Mohon pilih opsi upload sosial media!');
        document.getElementById('sosialMedia').focus();
        return;
    }
    
    if (!selectedMethod) {
        alert('Mohon pilih metode pembayaran terlebih dahulu!');
        return;
    }
    
    const paket = document.querySelector('.order-details h3')?.textContent || 'Package';
    const jadwalElement = document.querySelector('.order-meta-item');
    const jadwal = jadwalElement ? jadwalElement.textContent.trim() : '-';
    const total = document.querySelector('.total-amount')?.textContent || 'Rp 0';
    
    const paymentMethodNames = {
        'qris': 'QRIS',
        'bca': 'Transfer Bank BCA',
        'dana': 'Transfer DANA'
    };
    const metodePembayaran = paymentMethodNames[selectedMethod] || selectedMethod.toUpperCase();
    
    document.getElementById('confirm-paket').textContent = paket;
    document.getElementById('confirm-jadwal').textContent = jadwal;
    document.getElementById('confirm-nama').textContent = namaLengkap;
    document.getElementById('confirm-telp').textContent = nomorTelepon;
    document.getElementById('confirm-payment').textContent = metodePembayaran;
    document.getElementById('confirm-total').textContent = total;
    
    const confirmModal = document.getElementById('confirmModal');
    const modalDetail = confirmModal.querySelector('.modal-detail');
    if (modalDetail) {
        modalDetail.style.display = 'block';
    }
    
    confirmModal.classList.add('active');
    confirmModal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
    
    const btnProceed = document.getElementById('btnProceed');
    if (btnProceed) {
        const newBtn = btnProceed.cloneNode(true);
        btnProceed.parentNode.replaceChild(newBtn, btnProceed);
        newBtn.addEventListener('click', processBooking);
    }
}

window.closeConfirmModal = function() {
    const confirmModal = document.getElementById('confirmModal');
    confirmModal.classList.remove('active');
    confirmModal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

// ==========================================
// PROCESS BOOKING - SIMPAN & REDIRECT
// ==========================================
async function processBooking() {
    const btnProceed = document.getElementById('btnProceed');
    const btnText = btnProceed.querySelector('.btn-text');
    const btnLoading = btnProceed.querySelector('.btn-loading');

    btnText.style.display = 'none';
    btnLoading.style.display = 'flex';
    btnProceed.disabled = true;

    const urlParams = new URLSearchParams(window.location.search);
    
    const bookingData = {
        package_id: urlParams.get("package_id"),
        nama_pelanggan: document.getElementById("namaLengkap").value.trim(),
        nomor_telepon: document.getElementById("nomorTelepon").value.trim(),
        email: document.getElementById("email").value.trim(),
        tanggal: urlParams.get("tanggal"),
        waktu: urlParams.get("waktu"),
        zona_waktu: urlParams.get("zona_waktu") || "WIB",
        extra_people: parseInt(urlParams.get("extra_people") || 0),
        metode_pembayaran: selectedMethod,
        izin_sosmed: document.getElementById("sosialMedia").value,
        catatan: null,
        promo_code: document.getElementById("promoCode").value.trim(),
    };

    console.log('Booking Data:', bookingData);

    try {
        const response = await fetch('/booking/store', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            },
            body: JSON.stringify(bookingData)
        });

        const result = await response.json();

        if (result.success) {
            console.log('Booking saved:', result.data);
            
            // Close modal
            closeConfirmModal();
            
            // SHOW SUCCESS ALERT
            alert(`✅ Pesanan berhasil dibuat!\n\nKode Booking: ${result.data.kode_booking}\n\nAnda akan diarahkan ke WhatsApp untuk konfirmasi pembayaran.`);
            
            // REDIRECT KE WHATSAPP
            window.location.href = result.data.whatsapp_url;
            
        } else {
            alert('❌ ' + (result.message || 'Terjadi kesalahan. Silakan coba lagi.'));
            console.error('Booking error:', result);
            
            btnText.style.display = 'inline';
            btnLoading.style.display = 'none';
            btnProceed.disabled = false;
        }

    } catch (error) {
        console.error('Booking error:', error);
        alert('❌ Terjadi kesalahan koneksi. Silakan coba lagi.');
        
        btnText.style.display = 'inline';
        btnLoading.style.display = 'none';
        btnProceed.disabled = false;
    }
}

// ==========================================
// PROMO CODE
// ==========================================
document
    .querySelector(".apply-btn")
    ?.addEventListener("click", async function () {
        const code = document.getElementById("promoCode").value.trim();
        const totalEl = document.getElementById("totalAmount");
        const voucherDisplayEl = document.querySelector('.summary-item .text-danger'); // Tambahkan ini

        if (!code) {
            alert("Masukkan kode promo!");
            return;
        }

        const originalTotal = parseInt(
            totalEl.dataset.original || totalEl.innerText.replace(/\D/g, "")
        );

        try {
            const res = await fetch(`/check-promo?code=${code}&total=${originalTotal}`);
            const data = await res.json();

            if (!data.success) {
                showCustomAlert('error', 'Gagal!', data.message);
                return;
            }

            // Update total pembayaran
            totalEl.innerText = "Rp " + data.new_total.toLocaleString("id-ID");
            
            // ✅ UPDATE TAMPILAN VOUCHER (yang warna merah)
            const discount = originalTotal - data.new_total;
            if (voucherDisplayEl) {
                voucherDisplayEl.textContent = '- Rp ' + discount.toLocaleString('id-ID');
            }
            
            // Update hidden value untuk di confirm modal
            document.getElementById('discountValue').value = discount;

            // Show success alert
            showCustomAlert('success', 'Berhasil!', `Promo berhasil digunakan! Diskon Rp ${discount.toLocaleString('id-ID')}`);
            
        } catch (e) {
            console.error(e);
            showCustomAlert('error', 'Error!', 'Terjadi kesalahan server');
        }
    });

    // ==========================================
// CUSTOM ALERT MODAL
// ==========================================
function showCustomAlert(type, title, message) {
    // Remove existing alert if any
    const existingAlert = document.getElementById('customAlert');
    if (existingAlert) {
        existingAlert.remove();
    }

    const iconHTML = type === 'success' 
        ? '<svg class="alert-icon success" viewBox="0 0 52 52"><circle class="alert-icon-circle" cx="26" cy="26" r="25" fill="none"/><path class="alert-icon-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>'
        : '<svg class="alert-icon error" viewBox="0 0 52 52"><circle class="alert-icon-circle" cx="26" cy="26" r="25" fill="none"/><path class="alert-icon-line" fill="none" d="M16 16 36 36 M36 16 16 36"/></svg>';

    const alertHTML = `
        <div id="customAlert" class="custom-alert-overlay">
            <div class="custom-alert-modal">
                ${iconHTML}
                <h2 class="custom-alert-title">${title}</h2>
                <p class="custom-alert-message">${message}</p>
                <button class="custom-alert-btn" onclick="closeCustomAlert()">OK</button>
            </div>
        </div>
    `;

    document.body.insertAdjacentHTML('beforeend', alertHTML);
    
    // Show animation
    setTimeout(() => {
        document.getElementById('customAlert').classList.add('show');
    }, 10);
}

window.closeCustomAlert = function() {
    const alert = document.getElementById('customAlert');
    if (alert) {
        alert.classList.remove('show');
        setTimeout(() => alert.remove(), 300);
    }
}