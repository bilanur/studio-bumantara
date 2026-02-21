// ==========================================
// BOOKING 2 - KONFIRMASI & PEMBAYARAN
// With Alert Success & Redirect to WhatsApp
// ==========================================

let selectedMethod = null;

document.addEventListener('DOMContentLoaded', function() {
    initPaymentOptions();
    initMainButton();
    initCustomerValidation(); // <-- tambahan validasi real-time
});

// ==========================================
// VALIDASI REAL-TIME DETAIL CUSTOMER
// ==========================================
function initCustomerValidation() {

    // ── Helper ──────────────────────────────
    function createHint(afterElement, message) {
        const hint = document.createElement('span');
        hint.style.cssText = 'color:red;font-size:12px;display:none;margin-top:4px;';
        hint.textContent = message;
        afterElement.insertAdjacentElement('afterend', hint);
        return hint;
    }

    function showHint(hint, timer) {
        hint.style.display = 'block';
        hint.style.opacity = '1';
        clearTimeout(timer);
        return setTimeout(() => {
            hint.style.transition = 'opacity 0.3s';
            hint.style.opacity = '0';
            setTimeout(() => {
                hint.style.display = 'none';
                hint.style.opacity = '1';
            }, 300);
        }, 3000);
    }

    function hideHint(hint, timer) {
        clearTimeout(timer);
        hint.style.display = 'none';
        hint.style.opacity = '1';
    }

    // ── Nama Lengkap ─────────────────────────
    const namaInput = document.getElementById('namaLengkap');
    const namaHint  = createHint(namaInput, 'Nama tidak boleh mengandung angka atau simbol.');
    let namaTimer   = null;

    namaInput.addEventListener('keypress', function (e) {
        const char = String.fromCharCode(e.charCode);
        if (/[^a-zA-Z\s]/.test(char)) {
            e.preventDefault();
            namaTimer = showHint(namaHint, namaTimer);
        } else {
            hideHint(namaHint, namaTimer);
        }
    });

    // ── Nomor Telepon ────────────────────────
    const hpInput    = document.getElementById('nomorTelepon');
    const hpHintChar = createHint(hpInput, 'Nomor telepon hanya boleh berisi angka.');
    const hpHintLen  = createHint(hpHintChar, 'Nomor telepon minimal 11 digit.');
    let hpCharTimer  = null;

    hpInput.addEventListener('keypress', function (e) {
        const char = String.fromCharCode(e.charCode);
        if (!/\d/.test(char)) {
            e.preventDefault();
            hpCharTimer = showHint(hpHintChar, hpCharTimer);
        } else {
            hideHint(hpHintChar, hpCharTimer);
        }
    });

    hpInput.addEventListener('input', function () {
        const val = hpInput.value.trim();
        if (val.length > 13) hpInput.value = val.slice(0, 13);
        hpHintLen.style.display = (val.length >= 4 && val.length < 11) ? 'block' : 'none';
        hpHintLen.style.opacity = '1';
    });

    hpInput.addEventListener('blur', function () {
        const val = hpInput.value.trim();
        hpHintLen.style.display = (val.length >= 4 && val.length < 11) ? 'block' : 'none';
        hpHintLen.style.opacity = '1';
    });
}

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
    const namaLengkap  = document.getElementById('namaLengkap').value.trim();
    const nomorTelepon = document.getElementById('nomorTelepon').value.trim();
    const email        = document.getElementById('email').value.trim();
    const sosialMedia  = document.getElementById('sosialMedia').value;
    
    if (!namaLengkap) {
        showCustomAlert('error', 'Perhatian!', 'Mohon isi Nama Lengkap!');
        document.getElementById('namaLengkap').focus();
        return;
    }

    if (/[^a-zA-Z\s]/.test(namaLengkap)) {
        showCustomAlert('error', 'Perhatian!', 'Nama tidak boleh mengandung angka atau simbol!');
        document.getElementById('namaLengkap').focus();
        return;
    }
    
    if (!nomorTelepon) {
        showCustomAlert('error', 'Perhatian!', 'Mohon isi Nomor Telepon!');
        document.getElementById('nomorTelepon').focus();
        return;
    }

    if (nomorTelepon.length < 11) {
        showCustomAlert('error', 'Perhatian!', 'Nomor telepon minimal 11 digit!');
        document.getElementById('nomorTelepon').focus();
        return;
    }
    
    if (!email) {
        showCustomAlert('error', 'Perhatian!', 'Mohon isi Email!');
        document.getElementById('email').focus();
        return;
    }
    
    if (!email.includes('@')) {
        showCustomAlert('error', 'Perhatian!', 'Format email tidak valid!');
        document.getElementById('email').focus();
        return;
    }
    
    if (sosialMedia === 'Pilih opsi') {
        showCustomAlert('error', 'Perhatian!', 'Mohon pilih opsi upload sosial media!');
        document.getElementById('sosialMedia').focus();
        return;
    }
    
    if (!selectedMethod) {
        showCustomAlert('error', 'Perhatian!', 'Mohon pilih metode pembayaran terlebih dahulu!');
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
            closeConfirmModal();
            alert(`✅ Pesanan berhasil dibuat!\n\nKode Booking: ${result.data.kode_booking}\n\nAnda akan diarahkan ke WhatsApp untuk konfirmasi pembayaran.`);
            window.location.href = result.data.whatsapp_url;
            
        } else {
            showCustomAlert('error', 'Gagal!', result.message || 'Terjadi kesalahan. Silakan coba lagi.');
            console.error('Booking error:', result);
            
            btnText.style.display = 'inline';
            btnLoading.style.display = 'none';
            btnProceed.disabled = false;
        }

    } catch (error) {
        console.error('Booking error:', error);
        showCustomAlert('error', 'Error!', 'Terjadi kesalahan koneksi. Silakan coba lagi.');
        
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
        const voucherDisplayEl = document.querySelector('.summary-item .text-danger');

        if (!code) {
            showCustomAlert('error', 'Perhatian!', 'Masukkan kode promo!');
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

            totalEl.innerText = "Rp " + data.new_total.toLocaleString("id-ID");
            
            const discount = originalTotal - data.new_total;
            if (voucherDisplayEl) {
                voucherDisplayEl.textContent = '- Rp ' + discount.toLocaleString('id-ID');
            }
            
            document.getElementById('discountValue').value = discount;
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
    const existingAlert = document.getElementById('customAlert');
    if (existingAlert) existingAlert.remove();

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