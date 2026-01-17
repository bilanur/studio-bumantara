<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Profile' }}</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
</head>
<body>

    <main class="profile-wrapper">
        @yield('content')
    </main>

</body>
</html>
