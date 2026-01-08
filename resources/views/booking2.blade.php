<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bumantara Studio - Checkout</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/booking2.css') }}" rel="stylesheet">

</head>
<body>

     <!-- Header -->
    <header>
        <nav>
            <div class="logo">
                <span>📷</span>
                <span>bumantara</span>
            </div>
            <ul class="nav-links">
                <li><a href="#home">HOME</a></li>
                <li><a href="#about">ABOUT US</a></li>
                <li><a href="#package">PACKAGE</a></li>
                <li><a href="#testimonials">CLAIM PHOTO</a></li>
                <li><a href="#benefit">GALLERY</a></li>
            </ul>
            <div class="nav-right">
                <a href="#" class="masuk-btn-outline">MASUK</a>
                 <a href="#" class="masuk-btn">DAFTAR</a>
            </div>
        </nav>
    </header>

    <!-- Info Banner -->
    <div class="info-banner">
        <span class="info-banner-text">Hi sudah hadiyadnya! berakhir. Pastikan pembayaran dari Anda dilakukan dengan benar!</span>
    </div>

    <!-- Main Container -->
    <div class="checkout-container">
        <!-- Left Column -->
        <div class="left-column">
            <!-- Package Detail -->
            <div class="card">
                <h2 class="card-title">Detail Paket</h2>
                <div class="package-detail">
                    <img src="path/ke/couple-photo.jpg" alt="Package" class="package-image">
                    <div class="package-info">
                        <h3 class="package-name">Couple Self Photo Session - Studio 1</h3>
                        <ul class="package-features">
                            <li>14 desember</li>
                            <li>Harga : Rp 80.000</li>
                            <li>Durasi : 15 menit</li>
                            <li>+ Extra people(s) : 000000</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Customer Detail -->
            <div class="card">
                <h2 class="card-title">Detail Customer</h2>
                <p class="form-sublabel">Masukkan data lengkap kamu</p>
                
                <div class="form-section">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-input" placeholder="Nama lengkap" value="Nama lengkap">
                </div>

                <div class="form-section">
                    <label class="form-label">Nomor Telepon*</label>
                    <input type="tel" class="form-input" placeholder="62+-1234-5678" value="62+-1234-5678">
                </div>

                <div class="form-section">
                    <label class="form-label">Email*</label>
                    <input type="email" class="form-input" placeholder="hello@gmail.com" value="hello@gmail.com">
                </div>

                <div class="form-section">
                    <label class="form-label">Apakah boleh foto kalian untuk iklan upload di sosial media?*</label>
                    <input type="text" class="form-input" placeholder="Tidak atau iya" value="Tidak atau iya">
                </div>
            </div>

            <!-- Payment Detail -->
            <div class="card">
                <h2 class="card-title">Detail Pembayaran</h2>
                
                <div class="payment-table">
                    <div class="payment-row header">
                        <span>Metode Pembayaran</span>
                        <span>QRIS</span>
                    </div>
                    <div class="payment-row">
                        <span class="payment-item">Couple Self Photo Session - Studio 1</span>
                        <span class="payment-price">Rp 80.000</span>
                    </div>
                    <div class="payment-row">
                        <span class="payment-item">Couple Self Photo Session - Studio 1</span>
                        <span class="payment-price">Rp 80.000</span>
                    </div>
                    <div class="payment-row">
                        <span class="payment-item">Add ons</span>
                        <span class="payment-price">Rp 0</span>
                    </div>
                </div>

                <div class="promo-input-group">
                    <input type="text" class="form-input promo-input" placeholder="Kode Promo">
                    <button class="apply-btn">Apply</button>
                </div>
                <p class="promo-note">* coupon + Total Dapat Berubah</p>

                <div class="total-row">
                    <span class="total-label">Total</span>
                    <span class="total-price">Rp 80.000</span>
                </div>

                <p class="checkout-note">* Pastikan data sudah benar sebelum anda proses pembayaran</p>

                <button class="pay-btn">Bayar</button>
            </div>
        </div>

        <!-- Right Column -->
        <div class="right-column">
            <!-- Payment Methods -->
            <div class="payment-methods">
                <h2 class="section-title">Pilih metode pembayaran</h2>
                <div class="payment-grid">
                    <div class="payment-option">
                        <span style="font-weight: 700; color: #2c3e50;">Virtual Account</span>
                    </div>
                    <div class="payment-option">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/68/QRIS_logo.svg/2560px-QRIS_logo.svg.png" alt="QRIS">
                    </div>
                    <div class="payment-option">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" alt="BCA">
                    </div>
                    <div class="payment-option">
                        <img src="https://upload.wikimedia.org/wikipedia/id/thumb/5/55/BNI_logo.svg/2560px-BNI_logo.svg.png" alt="BNI">
                    </div>
                    <div class="payment-option">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/68/DANA_logo.svg/2560px-DANA_logo.svg.png" alt="DANA">
                    </div>
                    <div class="payment-option">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Logo_dana.png" alt="Bank BRI">
                    </div>
                    <div class="payment-option">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/86/Mandiri_logo_2016.svg" alt="Mandiri">
                    </div>
                </div>
            </div>

            <!-- Payment Info -->
            <div class="payment-info">
                <h2 class="section-title">Informasi Pembayaran</h2>
                <div class="info-item">
                    <span class="info-label">Status</span>
                    <span class="info-value status-pending">pending</span>
                </div>
                <div class="info-item">
                    <span class="info-label">No VA</span>
                    <div class="info-value-with-btn">
                        <span class="info-value">00000000000000000000</span>
                        <button class="submit-btn">Salin</button>
                    </div>
                </div>
                <div class="info-item">
                    <span class="info-label">Total Pembayaran</span>
                    <span class="info-value">200.000</span>
                </div>
                <div class="info-item">
                    <span class="info-label">no transaksi</span>
                    <span class="info-value">8812809012008</span>
                </div>
            </div>

            <!-- Proof Upload -->
            <div class="proof-upload">
                <h2 class="section-title">Kirim bukti pembayaran</h2>
                <div class="upload-area">
                    <p class="upload-text">seret & letakkan file di sini ...</p>
                </div>
                <div class="upload-buttons">
                    <button class="upload-btn">
                        <span>⬇</span>
                        <span>Tambahkan file</span>
                    </button>
                    <button class="send-btn">Kirim</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>