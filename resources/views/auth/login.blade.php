<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bumantara Studio | Login</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

   <style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card {
        width: 900px;
        height: 520px;
        background: #fff;
        border-radius: 12px;
        display: flex;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0,0,0,.15);
    }

    /* LEFT - NOW WHITE FORM */
    .left {
        width: 55%;
        padding: 40px;
        text-align: center;
    }

    .left h2 {
        color: #2B4D62;
        margin-bottom: 5px;
    }

    .left p {
        font-size: 14px;
        color: #777;
        margin-bottom: 25px;
    }

    /* RIGHT - NOW BLUE PANEL */
    .right {
        width: 45%;
        background: #2B4D62;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 40px;
    }

    .right h1 {
        font-size: 32px;
        margin-bottom: 10px;
    }

    .right p {
        font-size: 14px;
        opacity: .9;
    }

    .right a {
        display: inline-block;
        margin-top: 25px;
        padding: 10px 30px;
        border: 2px solid #fff;
        border-radius: 25px;
        color: #fff;
        text-decoration: none;
        font-size: 14px;
    }

    /* FORM */
    .form-box {
        margin-top: 40px; /* nurunin form */
        max-width: 380px;
        margin-left: auto;
        margin-right: auto;
    }

    .field {
        position: relative;
        margin-bottom: 14px;
    }

    .field input {
        width: 100%;
        padding: 12px 42px;
        border-radius: 6px;
        border: none;
        background: #f3f6f8; /* soft */
        font-size: 14px;
        box-sizing: border-box;
    }

    .icon-left {
        position: absolute;
        top: 50%;
        left: 14px;
        transform: translateY(-50%);
        width: 18px;
        opacity: .7;
    }

    .icon-right {
        position: absolute;
        top: 50%;
        right: 14px;
        transform: translateY(-50%);
        width: 18px;
        cursor: pointer;
        opacity: .7;
    }

    .btn {
        margin-top: 15px;
        padding: 10px 35px;
        background: #2B4D62;
        color: #fff;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        font-size: 14px;
    }

    .forgot {
        font-size: 13px;
        margin-top: 10px;
        display: inline-block;
        color: #555;
    }
</style>
</head>
<body>

<div class="wrapper">
    <div class="card">

        <!-- LEFT - NOW FORM -->
        <div class="left">
            <h2>Masuk</h2>
            <strong style="color:#2B4D62;">Bumantara Studio</strong>

            <form class="form-box" method="POST" action="{{ route('login') }}">
                @csrf

                <!-- EMAIL -->
                <div class="field">
                    <svg class="icon-left" fill="none" stroke="black" stroke-width="1.5" viewBox="0 0 24 24">
                        <path d="M4 4h16v16H4z"/>
                        <path d="M22 6l-10 7L2 6"/>
                    </svg>
                    <input type="email" name="email" placeholder="Email atau Ponsel" required>
                </div>

                <!-- PASSWORD -->
                <div class="field">
                    <svg class="icon-left" fill="none" stroke="black" stroke-width="1.5" viewBox="0 0 24 24">
                        <path d="M12 17a2 2 0 100-4 2 2 0 000 4z"/>
                        <path d="M5 11h14v8H5z"/>
                        <path d="M8 11V7a4 4 0 018 0v4"/>
                    </svg>

                    <input type="password" id="password" name="password" placeholder="Kata sandi" required>

                    <!-- EYE -->
                    <svg class="icon-right" onclick="togglePassword()" fill="none" stroke="black" stroke-width="1.5" viewBox="0 0 24 24">
                        <path d="M1.5 12S5.5 5 12 5s10.5 7 10.5 7-4 7-10.5 7S1.5 12 1.5 12z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                </div>

                @if (Route::has('password.request'))
                    <a class="forgot" href="{{ route('password.request') }}">
                        Lupa kata sandi?
                    </a>
                @endif

                <br>
                <button class="btn" type="submit">Masuk</button>
            </form>
        </div>

        <!-- RIGHT - NOW BLUE PANEL -->
        <div class="right">
            <div>
                <h1>Belum punya akun?</h1>
                <p>
                  Daftar sekarang dan nikmati kemudahan booking foto studio secara online.
                </p>
                <a href="{{ route('register') }}">Daftar</a>
            </div>
        </div>

    </div>
</div>

<script>
    function togglePassword() {
        const pass = document.getElementById('password');
        pass.type = pass.type === 'password' ? 'text' : 'password';
    }
</script>
</body>
</html>