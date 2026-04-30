<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Robert Rigopoulos — Software Developer')</title>
    <meta name="description" content="@yield('description', 'Junior software developer based in Liverpool. BSc Computer Games Development. Four years across QA, tools, and end-to-end product delivery.')">

    {{-- CSRF token meta — used by the JS bootstrap (axios) for POST requests. --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=IBM+Plex+Mono:wght@400;500&family=IBM+Plex+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    {{-- Vite handles CSS/JS bundling. In dev: hot-reload. In prod: hashed assets. --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="wrap">
        @yield('content')
    </div>
</body>
</html>
