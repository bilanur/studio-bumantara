@php($title = 'Testimoni | Bumantara Studio')

@push('styles')
<link href="{{ asset('assets/css/testimoni.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/testimoni.js') }}" defer></script>
@endpush

<x-layout>

    <div class="dashboard-layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <ul class="sidebar-menu">
                <li class="sidebar-item">
                    <span class="sidebar-icon">👤</span>
                    <span>Febri Harijadi</span>
                </li>
                <li class="sidebar-item">
                    <span class="sidebar-icon">📋</span>
                    <span>Pesananan Saya</span>
                </li>
                <li class="sidebar-item active">
                    <span class="sidebar-icon">✍️</span>
                    <span>Tulis Testimoni Anda</span>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Page Title -->
            <div class="page-title">
                <h1>Tulis Testimoni Anda</h1>
            </div>

            <!-- Form Container -->
            <div class="form-container">
                <form id="testimonialForm">
                    <!-- Nama -->
                    <div class="form-group">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-input" placeholder="Masukkan nama Anda" required>
                    </div>

                    <!-- Komentar -->
                    <div class="form-group">
                        <label class="form-label">Komentar</label>
                        <textarea class="form-input form-textarea" placeholder="Tulis komentar Anda..." required></textarea>
                    </div>

                    <!-- Rating -->
                    <div class="rating-container">
                        <label class="rating-label">Rating</label>
                        <div class="rating-stars">
                            <span class="star" data-rating="1">★</span>
                            <span class="star" data-rating="2">★</span>
                            <span class="star" data-rating="3">★</span>
                            <span class="star" data-rating="4">★</span>
                            <span class="star" data-rating="5">★</span>
                        </div>
                        <p class="rating-hint">(klik bintang)</p>
                    </div>

                    <!-- Upload Area -->
                    <div class="upload-area" id="uploadArea">
                        <p class="upload-text">seret & letakkan file di sini ...</p>
                    </div>

                    <!-- Buttons -->
                    <div class="form-buttons">
                        <button type="button" class="upload-btn" id="uploadBtn">
                            <span>📤</span>
                            <span>Tambahkan file</span>
                        </button>
                        <button type="submit" class="submit-btn">Kirim</button>
                    </div>
                </form>
            </div>
        </main>
    </div>

</x-layout>