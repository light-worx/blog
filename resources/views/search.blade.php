@extends('layouts.app')

@section('title', $q !== '' ? 'Search: ' . $q : 'Search')

@section('content')
    @php
        $posts  = $results['posts']  ?? collect();
        $videos = $results['videos'] ?? collect();
        $pages  = $results['pages']  ?? collect();
        $total  = $posts->count() + $videos->count() + $pages->count();
    @endphp

    <h1 class="font-serif text-4xl font-semibold tracking-tight">Search</h1>

    <form action="{{ route('search') }}" method="GET" role="search" class="mt-6 flex max-w-xl gap-2">
        <input type="search" name="q" value="{{ $q }}" aria-label="Search posts, videos and pages"
               placeholder="Search posts, videos and pages"
               class="min-w-0 flex-1 rounded-md border border-line bg-transparent px-4 py-2.5 placeholder:text-muted focus:border-accent">
        <button type="submit" class="rounded-md bg-ink px-5 py-2.5 text-sm font-medium text-paper hover:opacity-90">Search</button>
    </form>

    <div class="mt-10">
        @if ($q === '')
            <p class="text-muted">Enter a word or phrase to search everything on the site.</p>
        @elseif (mb_strlen($q) < 2)
            <p class="text-muted">Enter at least 2 characters.</p>
        @elseif ($total === 0)
            <p class="text-muted">Nothing found for &ldquo;{{ $q }}&rdquo;. Try a different word or fewer words.</p>
        @else
            <p class="text-sm text-muted">{{ $total }} {{ Str::plural('result', $total) }} for &ldquo;{{ $q }}&rdquo;</p>

            @if ($posts->isNotEmpty())
                <section class="mt-8" aria-labelledby="r-posts">
                    <h2 id="r-posts" class="border-b border-line pb-2 font-serif text-2xl font-semibold">Posts</h2>
                    <div class="divide-y divide-line">
                        @foreach ($posts as $post)
                            <x-post-row :post="$post" />
                        @endforeach
                    </div>
                </section>
            @endif

            @if ($videos->isNotEmpty())
                <section class="mt-10" aria-labelledby="r-videos">
                    <h2 id="r-videos" class="border-b border-line pb-2 font-serif text-2xl font-semibold">Videos</h2>
                    <div class="mt-6 grid gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($videos as $video)
                            <x-video-card :video="$video" />
                        @endforeach
                    </div>
                </section>
            @endif

            @if ($pages->isNotEmpty())
                <section class="mt-10" aria-labelledby="r-pages">
                    <h2 id="r-pages" class="border-b border-line pb-2 font-serif text-2xl font-semibold">Pages</h2>
                    <ul class="divide-y divide-line">
                        @foreach ($pages as $page)
                            <li class="py-4">
                                <a href="{{ $page->slug === 'about' ? route('about') : url($page->slug) }}"
                                   class="font-serif text-xl font-semibold hover:text-accent">{{ $page->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </section>
            @endif
        @endif
    </div>
@endsection
