<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bumantara Studio | Register</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/register.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/register.js') }}" defer></script>
    
</head>
<body>

<div class="wrapper">
    <div class="card">

        <!-- LEFT -->
        <div class="left">
            <div>
                <h1>Selamat Datang!</h1>
                <p>
                    Untuk tetap terhubung dengan kami<br>
                    silakan login dengan informasi pribadi Anda
                </p>

                <a href="{{ route('login') }}">Masuk</a>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="right">
            <h2>Buat Akun</h2>
            <strong style="color:#2B4D62;">Bumantara Studio</strong>

            <p>atau gunakan email Anda untuk pendaftaran</p>

            <!-- ALERT SUCCESS -->
            @if(session('success'))
            <div class="alert alert-success show">
                ✓ {{ session('success') }}
            </div>
            @endif

            <!-- ALERT ERROR -->
            @if($errors->any())
            <div class="alert alert-error show">
                <ul style="margin: 0; padding-left: 20px; text-align: left;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('register') }}" id="registerForm">
                @csrf

                <!-- NAMA -->
                <div class="field">
                    <svg class="icon-left" fill="none" stroke="black" stroke-width="1.5" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    <input type="text" name="name" placeholder="Nama" required>
                </div>

                <!-- EMAIL -->
                <div class="field">
                    <svg class="icon-left" fill="none" stroke="black" stroke-width="1.5" viewBox="0 0 24 24">
                        <path d="M4 4h16v16H4z"/>
                        <path d="M22 6l-10 7L2 6"/>
                    </svg>
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <!-- PONSEL -->
                <div class="field">
                    <svg class="icon-left" fill="none" stroke="black" stroke-width="1.5" viewBox="0 0 24 24">
                        <rect x="5" y="2" width="14" height="20" rx="2" ry="2"/>
                        <line x1="12" y1="18" x2="12.01" y2="18"/>
                    </svg>
                    <input type="text" name="no_hp" placeholder="Ponsel" required>
                </div>

                <!-- PASSWORD -->
                <div class="field">
                    <svg class="icon-left" fill="none" stroke="black" stroke-width="1.5" viewBox="0 0 24 24">
                        <path d="M12 17a2 2 0 100-4 2 2 0 000 4z"/>
                        <path d="M5 11h14v8H5z"/>
                        <path d="M8 11V7a4 4 0 018 0v4"/>
                    </svg>
                    <input type="password" id="password" name="password" placeholder="Kata sandi" required>
                    <svg class="icon-right" onclick="togglePassword('password')" fill="none" stroke="black" stroke-width="1.5" viewBox="0 0 24 24">
                        <path d="M1.5 12S5.5 5 12 5s10.5 7 10.5 7-4 7-10.5 7S1.5 12 1.5 12z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                </div>

                <!-- PASSWORD CONFIRMATION -->
                <div class="field">
                    <svg class="icon-left" fill="none" stroke="black" stroke-width="1.5" viewBox="0 0 24 24">
                        <path d="M12 17a2 2 0 100-4 2 2 0 000 4z"/>
                        <path d="M5 11h14v8H5z"/>
                        <path d="M8 11V7a4 4 0 018 0v4"/>
                    </svg>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi kata sandi" required>
                    <svg class="icon-right" onclick="togglePassword('password_confirmation')" fill="none" stroke="black" stroke-width="1.5" viewBox="0 0 24 24">
                        <path d="M1.5 12S5.5 5 12 5s10.5 7 10.5 7-4 7-10.5 7S1.5 12 1.5 12z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                </div>

                <button class="btn" type="submit">Daftar</button>
            </form>
        </div>

    </div>
</div>

</body>
</html>