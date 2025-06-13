<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Mon Site')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="bg-dark text-white p-3">Mon Site</header>
    <main class="container py-4">
        @yield('content')
    </main>
    <footer class="text-center text-muted py-3">&copy; {{ date('Y') }}</footer>
</body>
</html>