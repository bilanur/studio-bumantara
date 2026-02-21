function togglePassword(fieldId) {
    const pass = document.getElementById(fieldId);
    pass.type = pass.type === 'password' ? 'text' : 'password';
}

// Auto hide alert after 5 seconds
const alerts = document.querySelectorAll('.alert.show');
alerts.forEach(alert => {
    setTimeout(() => {
        alert.style.transition = 'opacity 0.3s';
        alert.style.opacity = '0';
        setTimeout(() => {
            alert.style.display = 'none';
        }, 300);
    }, 5000);
});

// ── Helper ────────────────────────────────────────────────
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

// ── Validasi Nama ─────────────────────────────────────────
const nameInput = document.querySelector('input[name="name"]');
const nameHint  = document.createElement('span');
nameHint.style.cssText = 'color:red;font-size:12px;display:none;margin-top:4px;';
nameHint.textContent   = 'Nama tidak boleh mengandung angka atau simbol.';
// Sisipkan langsung setelah div.field nama
nameInput.closest('.field').insertAdjacentElement('afterend', nameHint);
let nameHintTimer = null;

nameInput.addEventListener('keypress', function (e) {
    const char = String.fromCharCode(e.charCode);
    if (/[^a-zA-Z\s]/.test(char)) {
        e.preventDefault();
        nameHintTimer = showHint(nameHint, nameHintTimer);
    } else {
        hideHint(nameHint, nameHintTimer);
    }
});

// ── Validasi No HP ────────────────────────────────────────
const hpInput = document.querySelector('input[name="no_hp"]');
const hpField = hpInput.closest('.field');

// Kedua hint disisipkan tepat setelah div.field HP
const hpHintChar = document.createElement('span');
hpHintChar.style.cssText = 'color:red;font-size:12px;display:none;margin-top:4px;';
hpHintChar.textContent   = 'Nomor ponsel hanya boleh berisi angka.';
hpField.insertAdjacentElement('afterend', hpHintChar);

const hpHintLen = document.createElement('span');
hpHintLen.style.cssText = 'color:red;font-size:12px;display:none;margin-top:4px;';
hpHintLen.textContent   = 'Nomor ponsel minimal 11 digit.';
hpHintChar.insertAdjacentElement('afterend', hpHintLen);

let hpHintCharTimer = null;

hpInput.addEventListener('keypress', function (e) {
    const char = String.fromCharCode(e.charCode);
    if (!/\d/.test(char)) {
        e.preventDefault();
        hpHintCharTimer = showHint(hpHintChar, hpHintCharTimer);
    } else {
        hideHint(hpHintChar, hpHintCharTimer);
    }
});

hpInput.addEventListener('input', function () {
    const val = hpInput.value.trim();
    if (val.length > 13) hpInput.value = val.slice(0, 13);
    hpHintLen.style.display = (val.length > 0 && val.length < 11) ? 'block' : 'none';
    hpHintLen.style.opacity = '1';
});

hpInput.addEventListener('blur', function () {
    const val = hpInput.value.trim();
    hpHintLen.style.display = (val.length > 0 && val.length < 11) ? 'block' : 'none';
    hpHintLen.style.opacity = '1';
});

// ── Validasi submit ───────────────────────────────────────
document.getElementById('registerForm').addEventListener('submit', function (e) {
    const name  = document.querySelector('input[name="name"]');
    const noHp  = document.querySelector('input[name="no_hp"]');
    const pass  = document.getElementById('password');
    const passC = document.getElementById('password_confirmation');

    let errors = [];

    if (/[^a-zA-Z\s]/.test(name.value.trim())) {
        errors.push('Nama hanya boleh berisi huruf, tidak boleh ada angka atau simbol.');
    }

    const hpVal = noHp.value.trim();
    if (!/^\d+$/.test(hpVal)) {
        errors.push('Nomor ponsel hanya boleh berisi angka.');
    } else if (hpVal.length < 11) {
        errors.push('Nomor ponsel minimal 11 digit.');
    }

    if (pass.value !== passC.value) {
        errors.push('Konfirmasi kata sandi tidak cocok.');
    }

    if (errors.length > 0) {
        e.preventDefault();

        let alertBox = document.querySelector('.alert.alert-error');
        if (!alertBox) {
            alertBox = document.createElement('div');
            alertBox.className = 'alert alert-error';
            const form = document.getElementById('registerForm');
            form.parentNode.insertBefore(alertBox, form);
        }

        alertBox.innerHTML = '<ul style="margin:0;padding-left:20px;text-align:left;">'
            + errors.map(err => `<li>${err}</li>`).join('')
            + '</ul>';
        alertBox.style.display = '';
        alertBox.style.opacity = '1';
        alertBox.classList.add('show');
        alertBox.scrollIntoView({ behavior: 'smooth', block: 'center' });

        setTimeout(() => {
            alertBox.style.transition = 'opacity 0.3s';
            alertBox.style.opacity = '0';
            setTimeout(() => { alertBox.style.display = 'none'; }, 300);
        }, 5000);
    }
});