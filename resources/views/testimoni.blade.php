@php($title = 'Testimoni | Bumantara Studio')

@push('styles')
<link href="{{ asset('assets/css/testimoni.css') }}" rel="stylesheet">
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
                    <span class="sidebar-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </span>
                    <span>{{ Auth::check() ? Auth::user()->name : 'Guest' }}</span>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('booking3') }}">
                        <span class="sidebar-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M9 11H3v2h6v-2zm0-4H3v2h6V7zm0 8H3v2h6v-2zm12-6v-2h-6v2h6zm0 4v-2h-6v2h6zm0 4v-2h-6v2h6zM7 7v10h10V7H7zm2 8V9h6v6H9z"></path>
                                <rect x="9" y="9" width="6" height="6"></rect>
                            </svg>
                        </span>
                        <span>Pesanan Aktif</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('booking.riwayat') }}">
                        <span class="sidebar-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </span>
                        <span>Riwayat Pesanan</span>
                    </a>
                </li>

                <li class="sidebar-item active">
                    <a href="{{ route('testimoni') }}">
                        <span class="sidebar-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                        </span>
                        <span>Tulis Testimoni</span>
                    </a>
                </li>

            </ul>

        </aside>

        <main class="main-content">

            <div class="testimoni-card">

                <h2 class="page-title">Tulis Testimoni</h2>

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