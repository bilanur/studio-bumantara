<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bumantara Studio - Tulis Testimoni Anda</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/testimoni.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/testimoni.js') }}"></script>

</head>
<body>

     <!-- Header -->
    <header>
        <nav>
            <div class="logo">
                <span>📷</span>
                <span>bumantara</span>
            </div>
            <ul class="nav-links">
                <li><a href="#home">HOME</a></li>
                <li><a href="#about">ABOUT US</a></li>
                <li><a href="#package">PACKAGE</a></li>
                <li><a href="#testimonials">CLAIM PHOTO</a></li>
                <li><a href="#benefit">GALLERY</a></li>
            </ul>
            <div class="nav-right">
                <a href="#" class="masuk-btn-outline">MASUK</a>
                 <a href="#" class="masuk-btn">DAFTAR</a>
            </div>
        </nav>
    </header>

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

</body>
</html>