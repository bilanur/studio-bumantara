<!-- HOME.BLADE.PHP -->
@php($title = 'Home | Bumantara Studio')

@push('styles')
<link href="{{ asset('assets/css/home.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/home.js') }}" defer></script>
@endpush

<x-layout>

    <!-- Hero Carousel -->
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
            <div class="about-badge">✨ Tentang Kami</div>
            <h2>Bumantara Studio itu apa sih?</h2>
            <p>Bumantara Studio adalah studio foto profesional yang menyediakan layanan foto pasangan, keluarga, wisuda, dan foto grup dengan konsep modern dan nyaman.</p>
            <p>Kami hadir dengan peralatan terkini dan tim fotografer berpengalaman untuk mengabadikan setiap momen berharga Anda.</p>

            <a href="{{ route('about') }}" class="about-btn">Baca Selengkapnya</a>
        </div>

        <div class="about-images">
            <div class="image-grid">
                <div class="about-img-card large">
                    <img src="{{ asset('assets/images/wisuda.jpeg') }}" alt="Foto Wisuda">
                    <div class="img-overlay">
                        <span>Foto Wisuda</span>
                    </div>
                </div>
                <div class="about-img-card">
                    <img src="{{ asset('assets/images/keluarga.jpeg') }}" alt="Foto Keluarga">
                    <div class="img-overlay">
                        <span>Foto Keluarga</span>
                    </div>
                </div>
                <div class="about-img-card">
                    <img src="{{ asset('assets/images/couple.jpg') }}" alt="Foto Couple">
                    <div class="img-overlay">
                        <span>Foto Couple</span>
                    </div>
                </div>
                <div class="about-img-card wide">
                    <img src="{{ asset('assets/images/group.jpg') }}" alt="Foto Group">
                    <div class="img-overlay">
                        <span>Foto Group</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="service">
        <div class="services-container">
            <h2>Layanan Kami</h2>
            <div class="services-grid">
                <div class="service-card" style="background-image: url('{{ asset('assets/images/wisuda.jpeg') }}')">
                    <div class="service-overlay">
                        <h3>Foto Wisuda</h3>
                    </div>
                </div>

                <div class="service-card" style="background-image: url('{{ asset('assets/images/keluarga.jpeg') }}')">
                    <div class="service-overlay">
                        <h3>Foto Keluarga</h3>
                    </div>
                </div>

                <div class="service-card" style="background-image: url('{{ asset('assets/images/j.jpeg') }}')">
                    <div class="service-overlay">
                        <h3>Foto Bestie</h3>
                    </div>
                </div>

                <div class="service-card" style="background-image: url('{{ asset('assets/images/group.jpg') }}')">
                    <div class="service-overlay">
                        <h3>Foto Group</h3>
                    </div>
                </div>
            </div>

            <div class="services-grid">
                <div class="service-card" style="background-image: url('{{ asset('assets/images/profesional.jpg') }}')">
                    <div class="service-overlay">
                        <h3>Foto Profesional</h3>
                    </div>
                </div>

                <div class="service-card" style="background-image: url('{{ asset('assets/images/couple.jpg') }}')">
                    <div class="service-overlay">
                        <h3>Foto Couple</h3>
                    </div>
                </div>

                <div class="service-card" style="background-image: url('{{ asset('assets/images/j.jpeg') }}')">
                    <div class="service-overlay">
                        <h3>Foto Prawedding</h3>
                    </div>
                </div>

                <div class="service-card" style="background-image: url('{{ asset('assets/images/j.jpeg') }}')">
                    <div class="service-overlay">
                        <h3>Foto Maternity</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials" id="testimonials">
        <div class="testimonials-header">
            <h2>APA KATA MEREKA?</h2>
            <p>Kepuasan klien adalah prioritas utama kami</p>
        </div>

        <div class="testimonials-grid">
            @foreach($testimonis as $item)
            <div class="testimonial-card">
                <div class="testimonial-image">
                    <img src="{{ $item->image
                        ? asset('storage/'.$item->image)
                        : asset('assets/images/default.jpg') }}">
                </div>

                <div class="testimonial-content">
                    <h4 class="testimonial-name">
                        {{ $item->user->name }}
                    </h4>

                    <div class="stars">
                        {{ str_repeat('★', $item->rating) }}
                    </div>

                    <p class="testimonial-text">
                        "{{ $item->comment }}"
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </section>


</x-layout>