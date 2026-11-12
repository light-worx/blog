@props(['post'])

<article class="grid gap-1 py-6 sm:grid-cols-[8rem_1fr] sm:gap-6">
    <time datetime="{{ $post->published_at->toDateString() }}" class="text-sm text-muted sm:pt-2">
        {{ $post->published_at->format('j M Y') }}
    </time>
    <div>
        <h2 class="font-serif text-2xl font-semibold leading-snug">
            <a href="{{ route('post', $post->slug) }}" class="hover:text-accent">{{ $post->title }}</a>
        </h2>
        @if ($post->excerpt)
            <p class="mt-2 max-w-prose font-serif text-lg leading-relaxed text-muted">{{ $post->excerpt }}</p>
        @endif
    </div>
</article>
