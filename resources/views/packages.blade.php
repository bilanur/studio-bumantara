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
                    <h3>{{ $package->name ?? 'Paket' }}</h3>
                </div>

                <img src="{{ $package->image ? asset('storage/'.$package->image) : asset('assets/images/j.jpeg') }}"
                    alt="{{ $package->name ?? 'Package' }}"
                    class="package-image">

                <div class="package-content">

                    <!-- DURASI & MAX PEOPLE -->
                    <ul class="package-features">
                        @if($package->duration)
                        <li><strong>Durasi:</strong> {{ $package->duration }} menit</li>
                        @endif
                        
                        @if($package->max_people)
                        <li><strong>Maksimal:</strong> {{ $package->max_people }} orang</li>
                        @endif

                        <!-- DESKRIPSI -->
                        @if($package->description)
                            @foreach (explode("\n", $package->description) as $item)
                                @if(trim($item))
                                <li>{{ $item }}</li>
                                @endif
                            @endforeach
                        @endif

                        <!-- FITUR TAMBAHAN -->
                        @if($package->theme_count)
                        <li><strong>✨ Tema:</strong> {{ $package->theme_count }} pilihan</li>
                        @endif

                        @if($package->print_count)
                        <li><strong>📸 Cetak Foto:</strong> {{ $package->print_count }} lembar</li>
                        @endif

                        @if($package->edited_count)
                        <li><strong>🎨 Edited File:</strong> {{ $package->edited_count }} file</li>
                        @endif

                        @if($package->has_gdrive)
                        <li><strong>☁️ All File by G.Drive</strong></li>
                        @endif
                    </ul>

                    <a href="{{ route('booking1', ['package_id' => $package->id]) }}" class="booking-btn">
                        Booking Now
                    </a>

                    @if($package->price)
                    <button class="price-btn">
                        Rp {{ number_format($package->price, 0, ',', '.') }}
                    </button>
                    @endif

                </div>
            </div>
            @endforeach

        </div>
    </section>

</x-layout>