@php($title = 'Home | Bumantara Studio')

@push('styles')
<link href="{{ asset('assets/css/home.css') }}" rel="stylesheet">
@endpush

<x-layout>

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