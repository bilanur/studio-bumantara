@php($title = 'Gallery | Bumantara Studio')

@push('styles')
<link href="{{ asset('assets/css/gallery.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/gallery.js') }}" defer></script>
@endpush

<x-layout>

    <div class="gallery-container">

        <!-- HEADER -->
        <div class="gallery-header">
            <h1 class="gallery-title">GALLERY</h1>
            <p class="gallery-subtitle">Jadilah Kece Bersama Bumantara Studio</p>
        </div>

        <!-- FILTER BUTTONS -->
        <div class="filter-buttons">

            <a href="{{ route('gallery') }}"
                class="filter-btn {{ !$category ? 'active' : '' }}">
                Semua
            </a>

            @foreach ($categories as $cat)
            <a href="{{ route('gallery', ['category' => $cat]) }}"
                class="filter-btn {{ $category === $cat ? 'active' : '' }}">
                {{ ucfirst($cat) }}
            </a>
            @endforeach

        </div>

        <!-- GALLERY GRID -->
        <div class="gallery-grid">

            @forelse ($galleries as $g)
            <div class="gallery-item" data-category="{{ $g->category }}">
                <img
                    src="{{ asset('storage/' . $g->image) }}"
                    alt="{{ $g->title }}"
                    class="gallery-image">
            </div>
            @empty
            <p class="text-center w-100 mt-4">
                Tidak ada foto pada kategori ini 📷
            </p>
            @endforelse

        </div>

    </div>

</x-layout>