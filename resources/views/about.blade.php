<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bumantara Studio - About Us</title>
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
            background: #fff;
        }

        /* Header */
        header {
            background: white;
            padding: 1.2rem 6%;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
        }

        .logo {
            font-size: 1.4rem;
            font-weight: 700;
            color: #1e4d6b;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2.5rem;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: #4a5568;
            font-size: 0.85rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #1e4d6b;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .language-selector {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: white;
            cursor: pointer;
            font-size: 0.85rem;
            color: #4a5568;
        }

        .masuk-btn {
            background: #1e4d6b;
            color: white;
            padding: 0.6rem 1.8rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            transition: background 0.3s;
        }

        .masuk-btn:hover {
            background: #163d54;
        }

        /* Page Title */
        .page-title {
            text-align: center;
            padding: 3rem 0 2rem;
            background: #f8f9fa;
        }

        .page-title h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #1e4d6b;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Hero About Section */
        .hero-about {
            padding: 4rem 6%;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 50%, rgba(144, 202, 249, 0.3) 100%);
            display: flex;
            align-items: center;
            gap: 4rem;
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
        }

        .hero-about-content {
            flex: 1;
            padding-right: 2rem;
        }

        .hero-about h2 {
            font-size: 2.5rem;
            color: #1e4d6b;
            margin-bottom: 1.5rem;
            line-height: 1.3;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .hero-about p {
            color: #5a6c7d;
            margin-bottom: 2rem;
            font-size: 0.95rem;
            line-height: 1.8;
        }

        .hero-about-buttons {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .hero-about-btn {
            background: #1e4d6b;
            color: white;
            padding: 0.9rem 2.2rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            transition: background 0.3s;
        }

        .hero-about-btn:hover {
            background: #163d54;
        }

        .hero-about-link {
            color: #1e4d6b;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            border-bottom: 2px solid #1e4d6b;
            padding-bottom: 2px;
        }

        .hero-about-images {
            flex: 1;
            position: relative;
        }

        .about-img-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            position: relative;
            z-index: 2;
        }

        .about-img {
            width: 100%;
            height: 180px;
            background: linear-gradient(135deg, #90caf9 0%, #64b5f6 100%);
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .about-img:nth-child(1) { 
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            grid-column: 1;
            grid-row: 1;
        }
        .about-img:nth-child(2) { 
            background: linear-gradient(135deg, #90caf9 0%, #64b5f6 100%);
            grid-column: 2;
            grid-row: 1 / 3;
            height: 100%;
        }
        .about-img:nth-child(3) { 
            background: linear-gradient(135deg, #64b5f6 0%, #42a5f5 100%);
            grid-column: 1;
            grid-row: 2;
        }

        .blue-shape {
            position: absolute;
            right: -50px;
            bottom: -50px;
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, #2196f3 0%, #1976d2 100%);
            border-radius: 50% 0 0 0;
            z-index: 1;
        }

        /* Description Section */
        .description-section {
            padding: 4rem 6%;
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
        }

        .description-section p {
            color: #5a6c7d;
            font-size: 0.95rem;
            line-height: 1.9;
            margin-bottom: 1.5rem;
        }

        /* Features Section */
        .features-section {
            padding: 3rem 6% 4rem;
            background: #f8f9fa;
        }

        .features-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
        }

        .feature-card {
            background: white;
            padding: 2rem 1.5rem;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: transform 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.12);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, #1e4d6b 0%, #2c5f7c 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
        }

        .feature-card h3 {
            font-size: 1rem;
            font-weight: 600;
            color: #1e4d6b;
            margin-bottom: 0.5rem;
        }

        .feature-card p {
            font-size: 0.85rem;
            color: #5a6c7d;
            line-height: 1.6;
        }

        /* Map Section */
        .map-section {
            padding: 4rem 6%;
            max-width: 1400px;
            margin: 0 auto;
        }

        .map-container {
            display: flex;
            gap: 3rem;
            align-items: flex-start;
        }

        .map-frame {
            flex: 2;
            height: 400px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            background: #e0e0e0;
        }

        .map-info {
            flex: 1;
            padding: 2rem 0;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .info-icon {
            width: 24px;
            height: 24px;
            background: #1e4d6b;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.8rem;
            flex-shrink: 0;
        }

        .info-text {
            color: #5a6c7d;
            font-size: 0.9rem;
            line-height: 1.7;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, #1e4d6b 0%, #163d54 50%, #0d2a3a 100%);
            color: white;
            padding: 3.5rem 6% 2rem;
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 4rem;
            padding-bottom: 2rem;
        }

        .footer-logo {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            letter-spacing: -0.5px;
        }

        .footer-address {
            font-size: 0.85rem;
            line-height: 1.7;
            margin-bottom: 1.5rem;
            opacity: 0.9;
        }

        .footer-section h3 {
            margin-bottom: 1.2rem;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.7rem;
        }

        .footer-section a {
            color: white;
            text-decoration: none;
            font-size: 0.85rem;
            opacity: 0.9;
            transition: opacity 0.3s;
        }

        .footer-section a:hover {
            opacity: 1;
        }

        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .social-icon {
            width: 38px;
            height: 38px;
            background: rgba(255,255,255,0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.3s;
        }

        .social-icon:hover {
            background: rgba(255,255,255,0.25);
        }

        @media (max-width: 1024px) {
            .hero-about {
                flex-direction: column;
                padding: 3rem 5%;
            }
            
            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .map-container {
                flex-direction: column;
            }
            
            .footer-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                gap: 1rem;
                font-size: 0.75rem;
            }
            
            .hero-about h2 {
                font-size: 2rem;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
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
                <li><a href="#testimonials">TESTIMONIALS</a></li>
                <li><a href="#benefit">BENEFIT</a></li>
            </ul>
            <div class="nav-right">
                <div class="language-selector">
                    <span>ENGLISH</span>
                    <span>▼</span>
                </div>
                <a href="#" class="masuk-btn">MASUK</a>
            </div>
        </nav>
    </header>

    <!-- Page Title -->
    <section class="page-title">
        <h1>ABOUT US</h1>
    </section>

    <!-- Hero About Section -->
    <section class="hero-about">
        <div class="hero-about-content">
            <h2>Abadikan Momen Berharga Anda Bersama Bumantara Studio</h2>
            <p>Studio foto profesional yang menyediakan layanan fotografi berkualitas tinggi untuk berbagai kebutuhan Anda. Dengan tim fotografer berpengalaman dan peralatan modern, kami siap mengabadikan momen spesial Anda dengan hasil yang memukau.</p>
            <div class="hero-about-buttons">
                <a href="#" class="hero-about-btn">Lihat Paket</a>
                <a href="#" class="hero-about-link">Lihat Portofolio</a>
            </div>
        </div>
        <div class="hero-about-images">
            <div class="about-img-grid">
                <div class="about-img"></div>
                <div class="about-img"></div>
                <div class="about-img"></div>
            </div>
            <div class="blue-shape"></div>
        </div>
    </section>

    <!-- Description Section -->
    <section class="description-section">
        <p>Bumantara Studio foto adalah studio fotografi yang mengkhususkan diri pada berbagai jenis sesi foto dengan pendekatan yang hangat dan personal. Kami berkeras memahami visi setiap klien dan bekerja dengan penuh dedikasi untuk menghasilkan foto yang berkelas, dan penuh makna.</p>
        <p>Dengan tim fotografer profesional yang berpengalaman dan peralatan yang terkini, kami siap menciptakan foto-foto yang bercerita. Sesi kami seluruhnya dirancang untuk memberikan kenyamanan, mulai dari personal hingga komersial. Setiap sesi kami tentang agar nyaman dan menghasilkan karya yang berkelas.</p>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="features-container">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">👍</div>
                    <h3>Pelayanan Mantap</h3>
                    <p>Layanan terbaik dengan tim profesional yang berpengalaman</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💰</div>
                    <h3>Harga Terjangkau</h3>
                    <p>Paket harga yang fleksibel sesuai budget Anda</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📶</div>
                    <h3>Free Wifi</h3>
                    <p>Akses internet gratis untuk kenyamanan Anda</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📷</div>
                    <h3>Kualitas Berjamin</h3>
                    <p>Hasil foto berkualitas tinggi dengan garansi kepuasan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="map-container">
            <div class="map-frame">
                <!-- Google Maps iframe akan ditempatkan di sini -->
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.6489!2d112.6345!3d-7.9666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNTcnNTkuOCJTIDExMsKwMzgnMDQuMiJF!5e0!3m2!1sen!2sid!4v1234567890"
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
            <div class="map-info">
                <div class="info-item">
                    <div class="info-icon">📍</div>
                    <div class="info-text">
                        Jl. Cendana Raya, Sawojajar Kec. Talun, Kabupaten Cirebon, Jawa Barat 45171
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon">📞</div>
                    <div class="info-text">
                        +6282 22XX XXXX
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon">📧</div>
                    <div class="info-text">
                        bumantarastudio@gmail.com
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <div class="footer-logo">Bumantara</div>
                <p class="footer-address">Jl. Cendana Raya, Sawojajar Kec. Talun, Kabupaten Cirebon, Jawa Barat 45171</p>
                <div class="social-icons">
                    <div class="social-icon">f</div>
                    <div class="social-icon">t</div>
                    <div class="social-icon">in</div>
                </div>
            </div>
            <div class="footer-section">
                <h3>Layanan Kami</h3>
                <ul>
                    <li><a href="#">Foto Wisuda</a></li>
                    <li><a href="#">Foto Wedding</a></li>
                    <li><a href="#">Foto Product</a></li>
                    <li><a href="#">Foto Keluarga</a></li>
                    <li><a href="#">Paket Hemat & Standar</a></li>
                    <li><a href="#">Paket Couple</a></li>
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
                    <li><a href="#">Outlet</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>