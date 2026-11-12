@extends('layouts.app')

@section('title', 'Videos')

@section('content')
    <h1 class="border-b border-line pb-3 font-serif text-4xl font-semibold tracking-tight">Videos</h1>

    @if ($videos->isNotEmpty())
        <div class="mt-8 grid gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($videos as $video)
                <x-video-card :video="$video" />
            @endforeach
        </div>
    @else
        <p class="py-6 text-muted">No videos published yet.</p>
    @endif

    <div class="mt-10">{{ $videos->links() }}</div>
@endsection
