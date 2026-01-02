<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bumantara Studio - Photography & Creative Studio</title>
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
            flex: 1;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2.5rem;
            align-items: center;
            flex: 2;
            justify-content: center;
        }
        
        .nav-right {
            flex: 1;
            display: flex;
            justify-content: flex-end;
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

        .user-icon {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .auth-btn {
            color: #4a5568;
            font-size: 0.85rem;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .auth-btn:hover {
            color: #1e4d6b;
        }
        
        .auth-divider {
            color: #4a5568;
        }

        /* Hero Section */
        .hero {
            background-image: url('path/ke/background-hero.jpg');
            background-size: cover;
            background-position: center;
            padding: 5rem 6% 5rem;
            display: flex;
            align-items: center;
            gap: 4rem;
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(227, 242, 253, 0.95) 0%, rgba(187, 222, 251, 0.9) 50%, rgba(144, 202, 249, 0.85) 100%);
            z-index: 0;
        }

        .hero-content {
            flex: 1;
            padding-right: 2rem;
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-size: 2.8rem;
            color: #1e4d6b;
            margin-bottom: 1.5rem;
            line-height: 1.3;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .hero p {
            color: #5a6c7d;
            margin-bottom: 2.5rem;
            font-size: 0.95rem;
            line-height: 1.8;
            font-weight: 400;
        }

        .hero-buttons {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .hero-btn {
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

        .hero-btn:hover {
            background: #163d54;
        }

        .hero-link {
            color: #1e4d6b;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            border-bottom: 2px solid #1e4d6b;
            padding-bottom: 2px;
        }

        .hero-images {
            flex: 1;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            position: relative;
            z-index: 1;
        }

        .hero-img {
            width: 100%;
            height: 160px;
            background-image: url('path/ke/foto1.jpg');
            background-size: cover;
            background-position: center;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .hero-img:nth-child(1) { background-image: url('path/ke/foto1.jpg'); }
        .hero-img:nth-child(2) { background-image: url('path/ke/foto2.jpg'); }
        .hero-img:nth-child(3) { background-image: url('path/ke/foto3.jpg'); }
        .hero-img:nth-child(4) { background-image: url('path/ke/foto4.jpg'); }

        /* About Section */
        .about {
            padding: 5rem 6%;
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            gap: 4rem;
            align-items: center;
            background: #fff;
        }

        .about-content {
            flex: 1;
        }

        .about h2 {
            font-size: 2.2rem;
            color: #1e4d6b;
            margin-bottom: 1.5rem;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .about p {
            color: #5a6c7d;
            margin-bottom: 1.2rem;
            line-height: 1.8;
            font-size: 0.95rem;
        }

        .about-btn {
            background: #1e4d6b;
            color: white;
            padding: 0.9rem 2.2rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 500;
            margin-top: 1rem;
            transition: background 0.3s;
        }

        .about-btn:hover {
            background: #163d54;
        }

        .about-images {
            flex: 1;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .about-img {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #90caf9 0%, #64b5f6 100%);
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .about-img:nth-child(1) { background: linear-gradient(135deg, #ffccbc 0%, #ffab91 100%); }
        .about-img:nth-child(2) { background: linear-gradient(135deg, #c5cae9 0%, #9fa8da 100%); }
        .about-img:nth-child(3) { background: linear-gradient(135deg, #90caf9 0%, #64b5f6 100%); }
        .about-img:nth-child(4) { background: linear-gradient(135deg, #ce93d8 0%, #ba68c8 100%); }

        /* Services Section */
        .services {
            padding: 5rem 6%;
            background: linear-gradient(180deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .services-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .services h2 {
            text-align: center;
            font-size: 2rem;
            color: #1e4d6b;
            margin-bottom: 3.5rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .service-card {
            position: relative;
            height: 220px;
            border-radius: 12px;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #1e4d6b 0%, #2c5f7c 100%);
            z-index: 1;
        }

        .service-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(30, 77, 107, 0.95);
            color: white;
            padding: 1.5rem;
            text-align: center;
            z-index: 2;
        }

        .service-overlay h3 {
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        /* Testimonials */
        .testimonials {
            padding: 5rem 6%;
            max-width: 1400px;
            margin: 0 auto;
            background: #fff;
        }

        .testimonials h2 {
            text-align: center;
            font-size: 2rem;
            color: #1e4d6b;
            margin-bottom: 3.5rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }

        .testimonial-card {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            padding: 2rem;
            border-radius: 12px;
            display: flex;
            gap: 1.5rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .testimonial-img {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #64b5f6 0%, #42a5f5 100%);
            border-radius: 50%;
            flex-shrink: 0;
        }

        .testimonial-content {
            flex: 1;
        }

        .stars {
            color: #ffa726;
            margin-bottom: 0.8rem;
            font-size: 1.1rem;
            letter-spacing: 2px;
        }

        .testimonial-text {
            color: #5a6c7d;
            margin-bottom: 0.8rem;
            font-size: 0.85rem;
            line-height: 1.7;
        }

        .testimonial-name {
            font-weight: 600;
            color: #1e4d6b;
            font-size: 0.9rem;
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
            .hero, .about {
                flex-direction: column;
                padding: 3rem 5%;
            }
            
            .services-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .testimonials-grid {
                grid-template-columns: 1fr;
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
            
            .hero h1 {
                font-size: 2rem;
            }
            
            .services-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <div class="logo">Bumantara</div>
            <ul class="nav-links">
                <li><a href="#home">HOME</a></li>
                <li><a href="#about">ABOUT US</a></li>
                <li><a href="#service">SERVICE</a></li>
                <li><a href="#testimonials">TESTIMONIALS</a></li>
                <li><a href="#benefit">BENEFIT</a></li>
            </ul>
            <div class="nav-right">
                <div class="user-icon">
                    <span>👤</span>
                    <a href="#" class="auth-btn">MASUK</a>
                    <span class="auth-divider">|</span>
                    <a href="#" class="auth-btn">DAFTAR</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Abadikan Momen Berharga Anda Bersama Bumantara Studio</h1>
            <p>Kami adalah tim fotografer berbakat dan berpengalaman yang siap membantu Anda mengabadikan setiap momen berharga yang tak kan terulang lagi. Dari foto pernikahan hingga sesi foto keluarga, kami hadir untuk memberikan hasil yang memukau.</p>
            <div class="hero-buttons">
                <a href="#" class="hero-btn">Mulai Pesan Sekarang</a>
                <a href="#" class="hero-link">Pelajari Lainnya</a>
            </div>
        </div>
        <div class="hero-images">
            <div class="hero-img"></div>
            <div class="hero-img"></div>
            <div class="hero-img"></div>
            <div class="hero-img"></div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <div class="about-content">
            <h2>Bumantara Studio itu apa sih?</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>
            <button class="about-btn">Baca Selengkapnya</button>
        </div>
        <div class="about-images">
            <div class="about-img"></div>
            <div class="about-img"></div>
            <div class="about-img"></div>
            <div class="about-img"></div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="service">
        <div class="services-container">
            <h2>OUR SERVICE</h2>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-overlay">
                        <h3>Foto Wisuda</h3>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-overlay">
                        <h3>Foto Prewedding</h3>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-overlay">
                        <h3>Foto Wedding</h3>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-overlay">
                        <h3>Foto Keluarga</h3>
                    </div>
                </div>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-overlay">
                        <h3>Foto Company</h3>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-overlay">
                        <h3>Foto Product</h3>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-overlay">
                        <h3>Video Pembuatan</h3>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-overlay">
                        <h3>Foto Portrait</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials" id="testimonials">
        <h2>TESTIMONI</h2>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-img"></div>
                <div class="testimonial-content">
                    <div class="stars">★★★★★</div>
                    <p class="testimonial-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    <p class="testimonial-name">Ahmad Fauzi</p>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-img"></div>
                <div class="testimonial-content">
                    <div class="stars">★★★★★</div>
                    <p class="testimonial-text">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p>
                    <p class="testimonial-name">Siti Nurhaliza</p>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-img"></div>
                <div class="testimonial-content">
                    <div class="stars">★★★★★</div>
                    <p class="testimonial-text">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
                    <p class="testimonial-name">Budi Santoso</p>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-img"></div>
                <div class="testimonial-content">
                    <div class="stars">★★★★★</div>
                    <p class="testimonial-text">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis.</p>
                    <p class="testimonial-name">Dewi Lestari</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <div class="footer-logo">Bumantara</div>
                <p class="footer-address">Jl. Soekarno Hatta No.9, Malang<br>Jawa Timur, Indonesia 65141</p>
                <div class="social-icons">
                    <div class="social-icon">f</div>
                    <div class="social-icon">t</div>
                    <div class="social-icon">in</div>
                </div>
            </div>
            <div class="footer-section">
                <h3>Layanan Kami</h3>
                <ul>
                    <li><a href="#">Email Marketing</a></li>
                    <li><a href="#">Campaigns</a></li>
                    <li><a href="#">Branding</a></li>
                    <li><a href="#">Offline</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Menu</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Service</a></li>
                    <li><a href="#">Gallery</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>