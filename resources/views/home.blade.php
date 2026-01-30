<!-- HOME.BLADE.PHP -->
@php($title = 'Home | Bumantara Studio')

@push('styles')
<link href="{{ asset('assets/css/home.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/home.js') }}" defer></script>
@endpush

<x-layout>

    <div class="hero-carousel">

        {{-- SLIDES --}}
        @foreach($carousels as $index => $carousel)
        <div class="hero-slide {{ $index == 0 ? 'active' : '' }}"
            style="background-image: url('{{ asset('storage/'.$carousel->image) }}')">

            <div class="hero-content">
                <div class="hero-text">
                    <h1>
                        {{ $carousel->title ?? 'Abadikan Momen Berharga Anda Bersama Bumantara Studio' }}
                    </h1>
                    <p>
                        Studio foto profesional untuk pasangan, keluarga, dan personal
                        dengan sistem booking yang mudah dan terjadwal
                    </p>
                    <div class="hero-buttons">
                        <a href="{{ route('packages') }}" class="hero-btn">Jadwalkan Foto</a>
        
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        {{-- NAVIGATION --}}
        <button class="carousel-nav prev" onclick="changeSlide(-1)">‹</button>
        <button class="carousel-nav next" onclick="changeSlide(1)">›</button>

        {{-- INDICATORS --}}
        <div class="carousel-indicators">
            @foreach($carousels as $index => $carousel)
            <div class="indicator {{ $index == 0 ? 'active' : '' }}"
                onclick="goToSlide({{ $index }})"></div>
            @endforeach
        </div>
    </div>


    <!-- About Section -->
    <section class="about" id="about">
        <div class="about-content">
            <div class="about-badge">✨ Tentang Kami</div>
            <h2>Bumantara Studio itu apa sih?</h2>
            <p>Bumantara Studio adalah studio foto profesional yang menyediakan layanan foto keluarga, wisuda, bestie, grup, couple, prawedding, maternity, dan pas foto dengan konsep modern dan nyaman.</p>

            <a href="#service" class="about-btn">Lihat Layanan</a>
        </div>

        <div class="about-images">
            <div class="image-grid">
                <div class="about-img-card large">
                    <img src="{{ asset('assets/images/1.jpeg') }}" alt="Foto Wisuda">
                    <div class="img-overlay">
                        <span>Foto Wisuda</span>
                    </div>
                </div>
                <div class="about-img-card">
                    <img src="{{ asset('assets/images/3.jpeg') }}" alt="Foto Keluarga">
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
                    <img src="{{ asset('assets/images/4.jpeg') }}" alt="Foto Group">
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
                <div class="service-card" style="background-image: url('{{ asset('assets/images/10.jpeg') }}')">
                    <div class="service-overlay">
                        <h3>Foto Wisuda</h3>
                    </div>
                </div>

                <div class="service-card" style="background-image: url('{{ asset('assets/images/keluarga.jpeg') }}')">
                    <div class="service-overlay">
                        <h3>Foto Keluarga</h3>
                    </div>
                </div>

                <div class="service-card" style="background-image: url('{{ asset('assets/images/6.jpeg') }}')">
                    <div class="service-overlay">
                        <h3>Foto Bestie</h3>
                    </div>
                </div>

                <div class="service-card" style="background-image: url('{{ asset('assets/images/j.jpeg') }}')">
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

                <div class="service-card" style="background-image: url('{{ asset('assets/images/11.jpeg') }}')">
                    <div class="service-overlay">
                        <h3>Foto Couple</h3>
                    </div>
                </div>

                <div class="service-card" style="background-image: url('{{ asset('assets/images/8.jpeg') }}')">
                    <div class="service-overlay">
                        <h3>Foto Prawedding</h3>
                    </div>
                </div>

                <div class="service-card" style="background-image: url('{{ asset('assets/images/9.jpeg') }}')">
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

        <!-- FILTER RATING -->
        <div class="testimonial-filter">
            <button class="filter-btn active" data-rating="all">Semua</button>
            @for ($i = 5; $i >= 1; $i--)
            <button class="filter-btn" data-rating="{{ $i }}">
                {{ $i }} ★
            </button>
            @endfor
        </div>

        <div class="testimonials-wrapper">
            <div class="testimonials-grid">

                @forelse($testimonis as $item)
                <div class="testimonial-card" data-rating="{{ $item->rating }}">

                    @if($item->image)
                    <div class="testimonial-image">
                        <img src="{{ asset('storage/'.$item->image) }}" alt="Testimoni {{ $item->user->name }}">
                    </div>
                    @endif

                    <div class="testimonial-content {{ !$item->image ? 'no-image' : '' }}">
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

                @empty
                <div class="no-testimonial">
                    Belum ada testimoni
                </div>
                @endforelse

            </div>
        </div>

    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const filterBtns = document.querySelectorAll(".filter-btn");
            const cards = document.querySelectorAll(".testimonial-card");

            filterBtns.forEach(btn => {
                btn.addEventListener("click", function() {

                    filterBtns.forEach(b => b.classList.remove("active"));
                    this.classList.add("active");

                    const rating = this.dataset.rating;

                    cards.forEach(card => {
                        if (rating === "all" || card.dataset.rating === rating) {
                            card.classList.remove("hidden");
                        } else {
                            card.classList.add("hidden");
                        }
                    });
                });
            });

        });
    </script>


</x-layout>