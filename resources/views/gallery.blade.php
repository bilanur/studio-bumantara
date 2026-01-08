@php($title = 'Gallery | Bumantara Studio')

@push('styles')
<link href="{{ asset('assets/css/gallery.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/gallery.js') }}" defer></script>
@endpush

<x-layout>

    <div class="gallery-container">
        <!-- Header -->
        <div class="gallery-header">
            <h1 class="gallery-title">GALLERY</h1>
            <p class="gallery-subtitle">Jadilah Kece Bersama Bumantara Studio</p>
        </div>

        <!-- Filter Buttons -->
        <div class="filter-buttons">
            <button class="filter-btn active" data-filter="all">Wedding</button>
            <button class="filter-btn" data-filter="prewedding">Prewedding</button>
            <button class="filter-btn" data-filter="wisuda">Wisuda</button>
            <button class="filter-btn" data-filter="keluarga">Keluarga</button>
            <button class="filter-btn" data-filter="personal">Personal Foto</button>
            <button class="filter-btn" data-filter="bisnis">Bisnis</button>
        </div>

        <!-- Gallery Grid -->
        <div class="gallery-grid">
            <!-- Row 1 -->
            <div class="gallery-item" data-category="wedding">
                <img src="path/ke/foto1.jpg" alt="Gallery 1" class="gallery-image">
            </div>
            <div class="gallery-item" data-category="wedding">
                <img src="path/ke/foto2.jpg" alt="Gallery 2" class="gallery-image">
            </div>
            <div class="gallery-item" data-category="wedding">
                <img src="path/ke/foto3.jpg" alt="Gallery 3" class="gallery-image">
            </div>
            <div class="gallery-item" data-category="wedding">
                <img src="path/ke/foto4.jpg" alt="Gallery 4" class="gallery-image">
            </div>

            <!-- Row 2 -->
            <div class="gallery-item" data-category="prewedding">
                <img src="path/ke/foto5.jpg" alt="Gallery 5" class="gallery-image">
            </div>
            <div class="gallery-item" data-category="prewedding">
                <img src="path/ke/foto6.jpg" alt="Gallery 6" class="gallery-image">
            </div>
            <div class="gallery-item" data-category="wisuda">
                <img src="path/ke/foto7.jpg" alt="Gallery 7" class="gallery-image">
            </div>
            <div class="gallery-item" data-category="wisuda">
                <img src="path/ke/foto8.jpg" alt="Gallery 8" class="gallery-image">
            </div>

            <!-- Row 3 -->
            <div class="gallery-item" data-category="keluarga">
                <img src="path/ke/foto9.jpg" alt="Gallery 9" class="gallery-image">
            </div>
            <div class="gallery-item" data-category="keluarga">
                <img src="path/ke/foto10.jpg" alt="Gallery 10" class="gallery-image">
            </div>
            <div class="gallery-item" data-category="personal">
                <img src="path/ke/foto11.jpg" alt="Gallery 11" class="gallery-image">
            </div>
            <div class="gallery-item" data-category="personal">
                <img src="path/ke/foto12.jpg" alt="Gallery 12" class="gallery-image">
            </div>

            <!-- Row 4 -->
            <div class="gallery-item" data-category="bisnis">
                <img src="path/ke/foto13.jpg" alt="Gallery 13" class="gallery-image">
            </div>
            <div class="gallery-item" data-category="bisnis">
                <img src="path/ke/foto14.jpg" alt="Gallery 14" class="gallery-image">
            </div>
            <div class="gallery-item" data-category="wedding">
                <img src="path/ke/foto15.jpg" alt="Gallery 15" class="gallery-image">
            </div>
            <div class="gallery-item" data-category="wedding">
                <img src="path/ke/foto16.jpg" alt="Gallery 16" class="gallery-image">
            </div>
        </div>
    </div>
    
</x-layout>