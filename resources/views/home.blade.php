@extends('layouts.app')

@section('content')
    <section class="max-w-3xl">
        <h1 class="font-serif text-5xl font-semibold leading-[1.05] tracking-tight sm:text-7xl">{{ config('app.name') }}</h1>
        {{-- Replace this sentence with a line about you --}}
        <p class="mt-6 max-w-xl font-serif text-xl leading-relaxed text-muted">
            Essays, notes and videos. <a href="{{ route('about') }}" class="text-accent underline underline-offset-4">Read more about me</a>.
        </p>
    </section>

    <section class="mt-20" aria-labelledby="recent-writing">
        <div class="flex items-baseline justify-between border-b border-line pb-3">
            <h2 id="recent-writing" class="font-serif text-2xl font-semibold">Recent writing</h2>
            <a href="{{ route('blog') }}" class="text-sm text-accent hover:underline">All posts</a>
        </div>

        <div class="divide-y divide-line">
            @forelse ($posts as $post)
                <x-post-row :post="$post" />
            @empty
                <p class="py-6 text-muted">No posts yet. <a href="{{ url('/admin') }}" class="text-accent underline underline-offset-4">Write your first post</a> in the admin panel.</p>
            @endforelse
        </div>
    </section>

    <section class="mt-16" aria-labelledby="recent-videos">
        <div class="flex items-baseline justify-between border-b border-line pb-3">
            <h2 id="recent-videos" class="font-serif text-2xl font-semibold">Recent videos</h2>
            <a href="{{ route('videos') }}" class="text-sm text-accent hover:underline">All videos</a>
        </div>

        @if ($videos->isNotEmpty())
            <div class="mt-6 grid gap-8 sm:grid-cols-3">
                @foreach ($videos as $video)
                    <x-video-card :video="$video" />
                @endforeach
            </div>
        @else
            <p class="py-6 text-muted">No videos yet. <a href="{{ url('/admin') }}" class="text-accent underline underline-offset-4">Add a YouTube link</a> in the admin panel.</p>
        @endif
    </section>
@endsection
