@props(['video'])

<a href="{{ route('video', $video->slug) }}" class="group block">
    <div class="relative aspect-video overflow-hidden rounded-md bg-line">
        @if ($video->youtube_id)
            <img src="https://i.ytimg.com/vi/{{ $video->youtube_id }}/hqdefault.jpg" alt=""
                 loading="lazy" class="h-full w-full object-cover">
        @endif
        <span class="absolute bottom-2 left-2 grid h-8 w-8 place-items-center rounded-full bg-paper/90 text-ink" aria-hidden="true">
            <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current"><path d="M8 5v14l11-7z"/></svg>
        </span>
    </div>
    <h3 class="mt-3 font-serif text-lg font-semibold leading-snug group-hover:text-accent">{{ $video->title }}</h3>
</a>
