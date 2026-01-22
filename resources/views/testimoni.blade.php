@php($title = 'Testimoni | Bumantara Studio')

@push('styles')
<link href="{{ asset('assets/css/testimoni.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/testimoni.js') }}" defer></script>
@endpush

<x-layout>

    <div class="dashboard-layout">
        <aside class="sidebar">
            <ul class="sidebar-menu">

                <!-- USERNAME (BUKAN LINK) -->
                <li class="sidebar-item user-item">
                    <span class="sidebar-icon">👤</span>
                    <span>Febri Harijadi</span>
                </li>

                <!-- PESANAN SAYA -->
                <li class="sidebar-item {{ request()->routeIs('booking3') ? 'active' : '' }}">
                    <span class="sidebar-icon">📋</span>
                    <a href="{{ route('booking3') }}" class="sidebar-link">
                        Pesanan Saya
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('testimoni') ? 'active' : '' }}">
                    <span class="sidebar-icon">✍️</span>
                    <a href="{{ route('testimoni') }}" class="sidebar-link">
                        Tulis Testimoni Anda
                    </a>
                </li>


            </ul>
        </aside>


        <main class="main-content">
            <div class="page-title">
                <h1>Tulis Testimoni Anda</h1>
            </div>

            <div class="form-container">

                @if(session('success'))
                <script>
                    alert("{{ session('success') }}");
                </script>
                @endif

                <form id="testimonialForm"
                    action="{{ route('testimoni.store') }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <!-- Komentar -->
                    <div class="form-group">
                        <label class="form-label">Komentar</label>
                        <textarea name="comment"
                            class="form-input form-textarea"
                            required></textarea>
                    </div>

                    <!-- Rating -->
                    <div class="rating-container">
                        <label class="rating-label">Rating</label>
                        <div class="rating-stars">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="star" data-rating="{{ $i }}">★</span>
                                @endfor
                        </div>
                        <input type="hidden" name="rating" id="ratingInput">
                    </div>

                    <!-- Upload Gambar -->
                    <div class="form-group">
                        <label class="form-label">Upload Gambar (Opsional)</label>

                        <div style="display:flex; gap:12px; align-items:center;">
                            <button type="button"
                                class="upload-btn"
                                id="uploadBtn">
                                Tambahkan file
                            </button>

                            <span id="fileName"
                                style="font-size:14px; color:#555;">
                                Belum ada file
                            </span>
                        </div>

                        <input type="file"
                            name="image"
                            id="fileInput"
                            hidden>
                    </div>

                    <!-- Submit -->
                    <div class="form-buttons">
                        <button type="submit" class="submit-btn">
                            Kirim
                        </button>
                    </div>

                </form>
            </div>
        </main>
    </div>

</x-layout>