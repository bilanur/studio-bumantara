<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bumantara Studio - Kategori & Daftar Harga</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            line-height: 1.6;
            background: #f5f5f5;
        }

        /* Page Title Section */
        .page-header {
            text-align: center;
            padding: 3rem 6% 2rem;
            background: white;
        }

        .page-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #1e4d6b;
            margin-bottom: 1rem;
        }

        .breadcrumb {
            font-size: 0.85rem;
            color: #888;
        }

        .breadcrumb a {
            color: #1e4d6b;
            text-decoration: none;
        }

        /* Packages Section */
        .packages-section {
            padding: 3rem 6% 4rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .packages-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .package-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            border: 2px solid #ddd;
        }

        .package-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        .package-header {
            background: #e8e8e8;
            padding: 1rem;
            text-align: center;
            border-bottom: 2px solid #ddd;
        }

        .package-header h3 {
            font-size: 1rem;
            font-weight: 600;
            color: #1e4d6b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .package-image {
            width: 100%;
            height: 220px;
            background: linear-gradient(135deg, #e3f2fd 0%, #90caf9 100%);
            object-fit: cover;
        }

        .package-content {
            padding: 1.5rem;
        }

        .package-features {
            list-style: none;
            margin-bottom: 1.5rem;
        }

        .package-features li {
            font-size: 0.85rem;
            color: #5a6c7d;
            padding: 0.5rem 0;
            padding-left: 1.5rem;
            position: relative;
        }

        .package-features li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #4caf50;
            font-weight: bold;
        }

        .booking-btn {
            width: 60%;
            background: #1e4d6b;
            color: white;
            padding: 0.5rem;
            border: none;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
            margin: 0 auto 0.8rem;
            display: block;
        }

        .booking-btn:hover {
            background: #163d54;
        }

        .price-btn {
            width: 100%;
            background: #2c5f7c;
            color: white;
            padding: 0.5rem;
            border: none;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }

        .price-btn:hover {
            background: #1e4d6b;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, #d0e8f2 0%, #a8d5e8 100%);
            padding: 3rem 6% 2rem;
            margin-top: 3rem;
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 4rem;
            margin-bottom: 2rem;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #1e4d6b;
        }

        .footer-logo-circle {
            width: 45px;
            height: 45px;
            background: #1e4d6b;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .footer-address {
            font-size: 0.85rem;
            line-height: 1.7;
            color: #5a6c7d;
            margin-bottom: 0.5rem;
        }

        .footer-section h3 {
            margin-bottom: 1.2rem;
            font-size: 1rem;
            font-weight: 600;
            color: #1e4d6b;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.7rem;
        }

        .footer-section a {
            color: #5a6c7d;
            text-decoration: none;
            font-size: 0.85rem;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: #1e4d6b;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(0,0,0,0.1);
            color: #5a6c7d;
            font-size: 0.8rem;
        }

        .floating-buttons {
            position: fixed;
            bottom: 30px;
            right: 30px;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            z-index: 1000;
        }

        .floating-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            transition: transform 0.3s;
            font-size: 1.5rem;
        }

        .floating-btn:hover {
            transform: scale(1.1);
        }

        .whatsapp-btn {
            background: #25d366;
            color: white;
        }

        .instagram-btn {
            background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
            color: white;
        }

        @media (max-width: 1024px) {
            .packages-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .footer-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        @media (max-width: 768px) {
            .packages-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Page Header -->
    <section class="page-header">
        <h1>Kategori & Daftar Harga</h1>
        <div class="breadcrumb">
            <a href="#">Beranda</a> / <a href="#">Kategori Koleksi Produk</a> / <span>Lengkap Dengan Daftar Harga Terbaru</span>
        </div>
    </section>

    <!-- Packages Section -->
    <section class="packages-section">
        <div class="packages-grid">
            <!-- Package 1: Foto Anak -->
            <div class="package-card">
                <div class="package-header">
                    <h3>Foto Anak</h3>
                </div>
                <img src="path/ke/foto-anak.jpg" alt="Foto Anak" class="package-image">
                <div class="package-content">
                    <ul class="package-features">
                        <li>4 Lembar</li>
                        <li>File Cetak Besar Resolusi</li>
                        <li>Soft File HD Foto</li>
                        <li>All Editan Retouch</li>
                        <li>1 Cetak Foto 4R</li>
                    </ul>
                    <button class="booking-btn">Booking Her</button>
                    <button class="price-btn">Rp 250.000</button>
                </div>
            </div>

            <!-- Package 2: Foto Prewedding -->
            <div class="package-card">
                <div class="package-header">
                    <h3>Foto Prewedding</h3>
                </div>
                <img src="path/ke/foto-prewedding.jpg" alt="Foto Prewedding" class="package-image">
                <div class="package-content">
                    <ul class="package-features">
                        <li>6 Lembar</li>
                        <li>File Cetak Besar Resolusi</li>
                        <li>Soft File HD Foto</li>
                        <li>All Editan Retouch</li>
                        <li>2 Cetak Foto 4R</li>
                    </ul>
                    <button class="booking-btn">Booking Her</button>
                    <button class="price-btn">Rp 450.000</button>
                </div>
            </div>

            <!-- Package 3: Foto Wedding -->
            <div class="package-card">
                <div class="package-header">
                    <h3>Foto Wedding</h3>
                </div>
                <img src="path/ke/foto-wedding.jpg" alt="Foto Wedding" class="package-image">
                <div class="package-content">
                    <ul class="package-features">
                        <li>8 Lembar</li>
                        <li>File Cetak Besar Resolusi</li>
                        <li>Soft File HD Foto</li>
                        <li>All Editan Retouch</li>
                        <li>3 Cetak Foto 4R</li>
                    </ul>
                    <button class="booking-btn">Booking Her</button>
                    <button class="price-btn">Rp 2.500.000</button>
                </div>
            </div>

            <!-- Package 4: Foto Wisuda -->
            <div class="package-card">
                <div class="package-header">
                    <h3>Foto Wisuda</h3>
                </div>
                <img src="path/ke/foto-wisuda.jpg" alt="Foto Wisuda" class="package-image">
                <div class="package-content">
                    <ul class="package-features">
                        <li>4 Lembar</li>
                        <li>File Cetak Besar Resolusi</li>
                        <li>Soft File HD Foto</li>
                        <li>All Editan Retouch</li>
                        <li>1 Cetak Foto 4R</li>
                    </ul>
                    <button class="booking-btn">Booking Her</button>
                    <button class="price-btn">Rp 150.000</button>
                </div>
            </div>

            <!-- Package 5: Foto Keluarga -->
            <div class="package-card">
                <div class="package-header">
                    <h3>Foto Keluarga</h3>
                </div>
                <img src="path/ke/foto-keluarga.jpg" alt="Foto Keluarga" class="package-image">
                <div class="package-content">
                    <ul class="package-features">
                        <li>5 Lembar</li>
                        <li>File Cetak Besar Resolusi</li>
                        <li>Soft File HD Foto</li>
                        <li>All Editan Retouch</li>
                        <li>2 Cetak Foto 4R</li>
                    </ul>
                    <button class="booking-btn">Booking Her</button>
                    <button class="price-btn">Rp 300.000</button>
                </div>
            </div>

            <!-- Package 6: Foto Studio -->
            <div class="package-card">
                <div class="package-header">
                    <h3>Foto Studio</h3>
                </div>
                <img src="path/ke/foto-studio.jpg" alt="Foto Studio" class="package-image">
                <div class="package-content">
                    <ul class="package-features">
                        <li>3 Lembar</li>
                        <li>File Cetak Besar Resolusi</li>
                        <li>Soft File HD Foto</li>
                        <li>All Editan Retouch</li>
                        <li>1 Cetak Foto 4R</li>
                    </ul>
                    <button class="booking-btn">Booking Her</button>
                    <button class="price-btn">Rp 100.000</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <div class="footer-logo">
                    <div class="footer-logo-circle">📷</div>
                    <span>Bumantara</span>
                </div>
                <p class="footer-address">Jl. Cendana Raya, Sawojajar Kec.<br>Talun, Kabupaten Cirebon, Jawa Barat 45171</p>
                <p class="footer-address" style="margin-top: 0.5rem;">© bumantara studio 2025</p>
            </div>
            <div class="footer-section">
                <h3>Layanan Kami</h3>
                <ul>
                    <li><a href="#">Foto Anak</a></li>
                    <li><a href="#">Foto Wisuda</a></li>
                    <li><a href="#">Foto Keluarga</a></li>
                    <li><a href="#">Foto Couple</a></li>
                    <li><a href="#">Foto Couple</a></li>
                    <li><a href="#">Sesi Foto</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Menu</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Package</a></li>
                    <li><a href="#">Promo List</a></li>
                    <li><a href="#">Gallery</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <!-- Floating Buttons -->
    <div class="floating-buttons">
        <div class="floating-btn whatsapp-btn">
            <span>💬</span>
        </div>
        <div class="floating-btn instagram-btn">
            <span>📷</span>
        </div>
    </div>
</body>
</html>