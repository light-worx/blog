@extends('layouts.app')

@section('title', $page->title)
@section('description', Str::limit(strip_tags($page->content), 155))

@section('content')
    <article class="max-w-2xl">
        <h1 class="font-serif text-4xl font-semibold leading-tight tracking-tight sm:text-5xl">{{ $page->title }}</h1>

        <div class="prose prose-lg mt-10 max-w-none font-serif prose-headings:font-serif prose-headings:font-semibold prose-a:underline-offset-4 prose-img:rounded-md">
            {!! $page->content !!}
        </div>
    </article>
@endsection
