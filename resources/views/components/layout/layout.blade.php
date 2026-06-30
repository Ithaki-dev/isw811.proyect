<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'ISW811' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col">

    <header class="bg-white border-b border-slate-200 sticky top-0 z-10">
        <div class="max-w-5xl mx-auto px-6">
            <x-layout.navbar />
        </div>
    </header>

    <main class="flex-1">
        <div class="max-w-5xl mx-auto px-6 py-10">
            {{ $slot }}
        </div>
    </main>


    <footer class="bg-white border-t border-slate-200 py-4">
        <div class="max-w-5xl mx-auto px-6 text-center text-sm text-slate-400">
            &copy; {{ date('Y') }} ISW811 — All rights reserved.
        </div>
    </footer>
    <x-flash />
</body>
</html>