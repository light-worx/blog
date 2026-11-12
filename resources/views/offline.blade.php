<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>{{ config('app.name') }} | Coming soon</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=newsreader:400,600|instrument-sans:400,500&display=swap" rel="stylesheet">

    <script>
        (function () {
            try {
                var t = localStorage.getItem('theme');
                if (t === 'dark' || (!t && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    document.documentElement.classList.add('dark');
                }
            } catch (e) {}
        })();
    </script>

    @vite(['resources/css/app.css'])
</head>
<body class="grid min-h-screen place-items-center bg-paper px-5 font-sans text-ink antialiased">
    <main class="w-full max-w-xl">
        <h1 class="font-serif text-5xl font-semibold leading-tight tracking-tight sm:text-6xl">{{ config('app.name') }}</h1>

        {{-- Edit this message to suit --}}
        <p class="mt-6 font-serif text-xl leading-relaxed text-muted">This site is being built and will be back soon.</p>

        <p class="mt-12 text-sm">
            <a href="{{ url('/admin/login') }}" class="text-muted underline underline-offset-4 hover:text-ink">Owner sign in</a>
        </p>
    </main>
</body>
</html>
