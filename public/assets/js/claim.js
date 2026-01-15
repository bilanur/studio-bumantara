// Claim Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.getElementById('searchForm');

    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            const email = this.querySelector('input[name="email"]').value;
            const transactionId = this.querySelector('input[name="transaction_id"]').value;

            // Validasi sederhana
            if (!email || !transactionId) {
                e.preventDefault();
                alert('Mohon isi semua field!');
                return false;
            }

            // Form akan submit secara normal ke route yang ditentukan
            // Atau bisa ditambahkan loading indicator
            const submitBtn = this.querySelector('.submit-btn');
            submitBtn.innerHTML = 'Mencari...';
            submitBtn.disabled = true;
        });
    }
});