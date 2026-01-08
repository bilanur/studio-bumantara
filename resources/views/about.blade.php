@php($title = 'About | Bumantara Studio')

@push('styles')
<link href="{{ asset('assets/css/about.css') }}" rel="stylesheet">
@endpush

<x-layout>

    <!-- Page Title -->
    <section class="page-title">
        <h1>ABOUT US</h1>
    </section>

   <div class="hero-carousel">
    <!-- Slide 1 -->
    <div class="hero-slide active" style="background-image: url('{{ asset('assets/images/slider2.jpeg') }}')">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Abadikan Momen Berharga Anda Bersama Bumantara Studio</h1>
                <p>Studio foto profesional untuk pasangan, keluarga, dan personal dengan sistem booking yang mudah dan terjadwal</p>
                <div class="hero-buttons">
                    <a href="#" class="hero-btn">Jadwalkan Foto</a>
                    <a href="#" class="hero-link">Lihat Layanan</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Slide 2 -->
    <div class="hero-slide" style="background-image: url('{{ asset('assets/images/slider3.jpeg') }}')">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Wujudkan Foto Impian Anda dengan Sentuhan Profesional</h1>
                <p>Kami adalah tim fotografer berbakat yang siap membantu Anda mengabadikan setiap momen berharga yang tak kan terulang lagi</p>
                <div class="hero-buttons">
                    <a href="#" class="hero-btn">Mulai Pesan Sekarang</a>
                    <a href="#" class="hero-link">Pelajari Lainnya</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Slide 3 -->
    <div class="hero-slide" style="background-image: url('{{ asset('assets/images/j.jpeg') }}')">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Hasil yang Memukau untuk Setiap Momen Spesial Anda</h1>
                <p>Dari foto pernikahan hingga sesi foto keluarga, kami hadir untuk memberikan hasil terbaik dan tak terlupakan</p>
                <div class="hero-buttons">
                    <a href="#" class="hero-btn">Konsultasi Gratis</a>
                    <a href="#" class="hero-link">Lihat Portfolio</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <button class="carousel-nav prev" onclick="changeSlide(-1)">‹</button>
    <button class="carousel-nav next" onclick="changeSlide(1)">›</button>

    <!-- Indicators -->
    <div class="carousel-indicators">
        <div class="indicator active" onclick="goToSlide(0)"></div>
        <div class="indicator" onclick="goToSlide(1)"></div>
        <div class="indicator" onclick="goToSlide(2)"></div>
    </div>
</div>


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

    <script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.hero-slide');
    const indicators = document.querySelectorAll('.indicator');
    let autoSlideInterval;

    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        indicators.forEach(indicator => indicator.classList.remove('active'));

        slides[index].classList.add('active');
        indicators[index].classList.add('active');
    }

    function changeSlide(direction) {
        currentSlide += direction;

        if (currentSlide < 0) {
            currentSlide = slides.length - 1;
        } else if (currentSlide >= slides.length) {
            currentSlide = 0;
        }

        showSlide(currentSlide);
        resetAutoSlide();
    }

    function goToSlide(index) {
        currentSlide = index;
        showSlide(currentSlide);
        resetAutoSlide();
    }

    function autoSlide() {
        currentSlide++;
        if (currentSlide >= slides.length) {
            currentSlide = 0;
        }
        showSlide(currentSlide);
    }

    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        autoSlideInterval = setInterval(autoSlide, 5000);
    }

    // Start auto slide
    autoSlideInterval = setInterval(autoSlide, 5000);

    // Pause on hover
    const carousel = document.querySelector('.hero-carousel');
    carousel.addEventListener('mouseenter', () => {
        clearInterval(autoSlideInterval);
    });

    carousel.addEventListener('mouseleave', () => {
        resetAutoSlide();
    });
</script>
    
</x-layout>