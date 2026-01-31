<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Bumantara Studio' }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CSS GLOBAL -->
    <link href="{{ asset('assets/css/base.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/navbar.js') }}" defer></script>

    <!-- CSS PER HALAMAN -->
    @stack('styles')

    <!-- JS PER HALAMAN -->
    @stack('scripts')
</head>
<body>

<x-navbar />

<main>
    {{ $slot }}
</main>

<x-footer />

</body>
</html>
