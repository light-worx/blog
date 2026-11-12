@extends('layouts.app')

@section('title', $video->title)
@section('description', Str::limit(strip_tags((string) $video->description), 155))

@section('content')
    <article class="max-w-3xl">
        <a href="{{ route('videos') }}" class="text-sm text-muted hover:text-ink">All videos</a>

        <h1 class="mt-6 font-serif text-4xl font-semibold leading-tight tracking-tight">{{ $video->title }}</h1>

        <p class="mt-3 text-sm text-muted">
            <time datetime="{{ $video->published_at->toDateString() }}">{{ $video->published_at->format('j F Y') }}</time>
        </p>

        @if ($video->youtube_id)
            <div class="mt-8 aspect-video overflow-hidden rounded-md bg-line">
                <iframe class="h-full w-full"
                        src="https://www.youtube-nocookie.com/embed/{{ $video->youtube_id }}"
                        title="{{ $video->title }}"
                        loading="lazy"
                        referrerpolicy="strict-origin-when-cross-origin"
                        allow="accelerometer; encrypted-media; gyroscope; picture-in-picture; fullscreen"
                        allowfullscreen></iframe>
            </div>
        @else
            <p class="mt-8 text-muted">This video link is not a valid YouTube address. <a href="{{ $video->youtube_url }}" class="text-accent underline underline-offset-4">Open the link</a>.</p>
        @endif

        @if ($video->description)
            <p class="mt-8 max-w-2xl font-serif text-lg leading-relaxed">{!! nl2br(e($video->description)) !!}</p>
        @endif
    </article>
@endsection
