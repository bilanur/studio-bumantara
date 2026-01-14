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

    <section class="packages-section">
        <div class="packages-grid">

            @foreach ($packages as $package)
            <div class="package-card">

                <div class="package-header">
                    <h3>{{ $package->name }}</h3>
                </div>

                <img src="{{ asset('assets/images/j.jpeg') }}"
                    alt="{{ $package->name }}"
                    class="package-image">

                <div class="package-content">

                    <!-- DURASI & MAX PEOPLE -->
                    <ul class="package-features">
                        <li><strong>Durasi:</strong> {{ $package->duration }} menit</li>
                        <li><strong>Maksimal:</strong> {{ $package->max_people }} orang</li>
                        @foreach (explode("\n", $package->description) as $item)
                        <li>{{ $item }}</li>
                        @endforeach
                    </ul>

                    <a href="{{ route('booking1') }}" class="booking-btn">
                        Booking Now
                    </a>

                    <button class="price-btn">
                        Rp {{ number_format($package->price, 0, ',', '.') }}
                    </button>

                </div>
            </div>
            @endforeach

        </div>
    </section>



</x-layout>