@extends('layouts.app')

@section('title', $post->title)
@section('description', $post->excerpt ?: Str::limit(strip_tags($post->content), 155))

@section('content')
    @php $minutes = max(1, (int) ceil(str_word_count(strip_tags($post->content)) / 220)); @endphp

    <article class="max-w-2xl">
        <a href="{{ route('blog') }}" class="text-sm text-muted hover:text-ink">All posts</a>

        <h1 class="mt-6 font-serif text-4xl font-semibold leading-tight tracking-tight sm:text-5xl">{{ $post->title }}</h1>

        <p class="mt-4 text-sm text-muted">
            <time datetime="{{ $post->published_at->toDateString() }}">{{ $post->published_at->format('j F Y') }}</time>,
            {{ $minutes }} min read
        </p>

        @if ($post->cover_image)
            <img src="{{ asset('storage/' . $post->cover_image) }}" alt="" class="mt-8 w-full rounded-md">
        @endif

        {{-- Content comes from the admin-only rich editor --}}
        <div class="prose prose-lg mt-10 max-w-none font-serif prose-headings:font-serif prose-headings:font-semibold prose-a:underline-offset-4 prose-img:rounded-md">
            {!! $post->content !!}
        </div>
    </article>
@endsection
