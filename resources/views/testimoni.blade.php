@php($title = 'Testimoni | Bumantara Studio')

@push('styles')
<style>
    .dashboard-layout {
        display: flex;
        min-height: 100vh;
        background: #f6f7fb;
    }

    /* SIDEBAR */

    .sidebar {
        width: 240px;
        background: white;
        border-right: 1px solid #e5e7eb;
        padding: 20px;
    }

    .sidebar-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar-item {
        margin-bottom: 12px;
    }

    .sidebar-item a {
        display: flex;
        gap: 8px;
        align-items: center;
        padding: 10px 14px;
        border-radius: 10px;
        text-decoration: none;
        color: #374151;
        transition: .2s;
    }

    .sidebar-item a:hover {
        background: #f1f5f9;
    }

    .sidebar-item.active a {
        background: #2563eb;
        color: white;
    }

    .user-item {
        font-weight: 600;
        margin-bottom: 24px;
    }

    /* MAIN */

    .main-content {
        flex: 1;
        padding: 32px;
    }

    /* CARD FORM */

    .testimoni-card {
        max-width: 520px;
        background: white;
        border-radius: 18px;
        padding: 24px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, .06);
    }

    .page-title {
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 16px;
    }

    /* FORM */

    .form-group {
        margin-bottom: 16px;
    }

    .form-label {
        display: block;
        font-weight: 500;
        margin-bottom: 6px;
    }

    .form-input {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        outline: none;
    }

    .form-textarea {
        min-height: 120px;
    }

    /* STAR */

    .rating-stars {
        font-size: 26px;
    }

    .star {
        cursor: pointer;
        color: #d1d5db;
    }

    .star.active {
        color: #facc15;
    }

    /* UPLOAD */

    .upload-btn {
        padding: 8px 14px;
        border-radius: 8px;
        border: 1px solid #d1d5db;
        background: white;
        cursor: pointer;
    }

    /* SUBMIT */

    .submit-btn {
        width: 100%;
        background: #2563eb;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
    }

    /* MOBILE */

    @media(max-width:768px) {
        .sidebar {
            display: none;
        }

        .main-content {
            padding: 16px;
        }
    }
</style>
@endpush
@push('scripts')
<script src="{{ asset('assets/js/testimoni.js') }}" defer></script>
@endpush

@push('scripts')
<script>
    document.querySelectorAll('.star').forEach(star => {
        star.addEventListener('click', () => {
            let rating = star.dataset.rating;

            document.getElementById('ratingInput').value = rating;

            document.querySelectorAll('.star').forEach(s => {
                s.classList.toggle('active', s.dataset.rating <= rating);
            });
        });
    });

    document.getElementById('uploadBtn').addEventListener('click', () => {
        document.getElementById('fileInput').click();
    });

    document.getElementById('fileInput').addEventListener('change', e => {
        document.getElementById('fileName').innerText =
            e.target.files[0]?.name || 'Belum ada file';
    });
</script>
@endpush

<x-layout>

    <div class="dashboard-layout">

        <aside class="sidebar">

            <ul class="sidebar-menu">

                <li class="sidebar-item user-item">
                    <span class="sidebar-icon">👤</span>
                    <span>{{ Auth::check() ? Auth::user()->name : 'Guest' }}</span>
                </li>


                <li class="sidebar-item">
                    <a href="{{ route('booking3') }}">📋 Pesanan Aktif</a>
                </li>

                    <a href="{{ route('booking.riwayat') }}">🕘 Riwayat Pesanan</a>
                </li>

                <li class="sidebar-item active">
                    <a href="{{ route('testimoni') }}">✍️ Tulis Testimoni</a>
                </li>

            </ul>

        </aside>

        <main class="main-content">

            <div class="testimoni-card">

                <div class="page-title">Tulis Testimoni</div>

                <form action="{{ route('testimoni.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="form-label">Komentar</label>
                        <textarea name="comment" class="form-input form-textarea" required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Rating</label>
                        <div class="rating-stars">
                            @for($i=1;$i<=5;$i++)
                                <span class="star" data-rating="{{ $i }}">★</span>
                                @endfor
                        </div>
                        <input type="hidden" name="rating" id="ratingInput">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Upload Gambar (Opsional)</label>

                        <div style="display:flex;gap:10px;align-items:center">
                            <button type="button" class="upload-btn" id="uploadBtn">Pilih File</button>
                            <span id="fileName">Belum ada file</span>
                        </div>

                        <input type="file" name="image" id="fileInput" hidden>

                    </div>

                    <button class="submit-btn">Kirim Testimoni</button>

                </form>

            </div>

        </main>

    </div>

</x-layout>