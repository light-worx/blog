@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <h1 class="border-b border-line pb-3 font-serif text-4xl font-semibold tracking-tight">Blog</h1>

    <div class="divide-y divide-line">
        @forelse ($posts as $post)
            <x-post-row :post="$post" />
        @empty
            <p class="py-6 text-muted">No posts published yet.</p>
        @endforelse
    </div>

    <div class="mt-8">{{ $posts->links() }}</div>
@endsection
