@php($title = 'Packages | Bumantara Studio')

@push('styles')
<link href="{{ asset('assets/css/packages.css') }}" rel="stylesheet">
@endpush

<x-layout>
  
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
                <img src="{{ asset('assets/images/j.jpeg') }}" alt="Foto Anak" class="package-image">
                <div class="package-content">
                    <ul class="package-features">
                        <li>4 Lembar</li>
                        <li>File Cetak Besar Resolusi</li>
                        <li>Soft File HD Foto</li>
                        <li>All Editan Retouch</li>
                        <li>1 Cetak Foto 4R</li>
                    </ul>
                   <a href="{{ route('booking1') }}" class="booking-btn">
    Booking Now
</a>

                    <button class="price-btn">Rp 250.000</button>
                </div>
            </div>

            <!-- Package 2: Foto Prewedding -->
            <div class="package-card">
                <div class="package-header">
                    <h3>Foto Prewedding</h3>
                </div>
                <img src="{{ asset('assets/images/j.jpeg') }}" alt="Foto Prewedding" class="package-image">
                <div class="package-content">
                    <ul class="package-features">
                        <li>6 Lembar</li>
                        <li>File Cetak Besar Resolusi</li>
                        <li>Soft File HD Foto</li>
                        <li>All Editan Retouch</li>
                        <li>2 Cetak Foto 4R</li>
                    </ul>
                     <a href="{{ route('booking1') }}" class="booking-btn">
    Booking Now
</a>
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
                    <a href="{{ route('booking1') }}" class="booking-btn">
    Booking Now
</a>
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
                     <a href="{{ route('booking1') }}" class="booking-btn">
    Booking Now
</a>
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
                     <a href="{{ route('booking1') }}" class="booking-btn">
    Booking Now
</a>
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
                   <a href="{{ route('booking1') }}" class="booking-btn">
    Booking Now
</a>
                    <button class="price-btn">Rp 100.000</button>
                </div>
            </div>
        </div>
    </section>
    
</x-layout>