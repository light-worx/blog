<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@hasSection('title')@yield('title') | @endif{{ config('app.name') }}</title>
    <meta name="description" content="@yield('description', 'Writing and videos by ' . config('app.name'))">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=newsreader:400,400i,600|instrument-sans:400,500,600&display=swap" rel="stylesheet">

    {{-- Apply the saved or system theme before first paint to avoid a flash --}}
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

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col bg-paper font-sans text-ink antialiased">
    <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-50 focus:rounded focus:bg-ink focus:px-3 focus:py-2 focus:text-paper">Skip to content</a>

    @php
        $nav = [
            ['Blog', route('blog'), ['blog', 'post']],
            ['Videos', route('videos'), ['videos', 'video']],
            ['About', route('about'), ['about']],
        ];
    @endphp

    <header class="border-b border-line">
        <div class="mx-auto flex max-w-4xl flex-wrap items-center gap-x-8 gap-y-3 px-5 py-4">
            <a href="{{ route('home') }}" class="font-serif text-xl font-semibold tracking-tight">{{ config('app.name') }}</a>

            <nav aria-label="Main" class="flex gap-5 text-sm">
                @foreach ($nav as [$label, $url, $names])
                    @php $active = request()->routeIs(...$names); @endphp
                    <a href="{{ $url }}"
                       @if ($active) aria-current="page" @endif
                       class="py-1 {{ $active ? 'font-medium underline decoration-accent decoration-2 underline-offset-8' : 'text-muted hover:text-ink' }}">{{ $label }}</a>
                @endforeach
            </nav>

            <div class="ml-auto flex items-center gap-2">
                <form action="{{ route('search') }}" method="GET" role="search">
                    <input type="search" name="q" value="{{ request('q') }}"
                           aria-label="Search the site" placeholder="Search"
                           class="w-36 rounded-md border border-line bg-transparent px-3 py-1.5 text-sm placeholder:text-muted focus:border-accent sm:w-56">
                </form>

                <button type="button" id="theme-toggle" aria-label="Toggle dark mode"
                        class="grid h-9 w-9 place-items-center rounded-md border border-line text-muted hover:text-ink">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M12 3a9 9 0 0 1 0 18z" fill="currentColor"/>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <main id="main" class="mx-auto w-full max-w-4xl flex-1 px-5 py-12">
        @yield('content')
    </main>

    <footer class="border-t border-line">
        <div class="mx-auto max-w-4xl px-5 py-6 text-sm text-muted">
            &copy; {{ date('Y') }} {{ config('app.name') }}
        </div>
    </footer>

    <script>
        document.getElementById('theme-toggle').addEventListener('click', function () {
            var dark = document.documentElement.classList.toggle('dark');
            try { localStorage.setItem('theme', dark ? 'dark' : 'light'); } catch (e) {}
        });
    </script>
</body>
</html>
