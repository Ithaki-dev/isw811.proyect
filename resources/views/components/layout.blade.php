@props(['title' => 'ISW811'])
<!DOCTYPE html>
<html lang="es" data-theme="dracula">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-navbar></x-navbar>

    <main class="min-h-screen">
        <div class="max-w-5xl mx-auto px-6 py-10">
            {{ $slot }}
        </div>
    </main>
</body>
</html>