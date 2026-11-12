<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use App\Models\Video;

class SiteController extends Controller
{
    public function home()
    {
        return view('home', [
            'posts'  => Post::published()->latest('published_at')->take(3)->get(),
            'videos' => Video::published()->latest('published_at')->take(3)->get(),
        ]);
    }

    public function blog()
    {
        return view('blog.index', [
            'posts' => Post::published()->latest('published_at')->paginate(10),
        ]);
    }

    public function post(Post $post)
    {
        abort_unless($post->isPublished(), 404);

        return view('blog.show', compact('post'));
    }

    public function videos()
    {
        return view('videos.index', [
            'videos' => Video::published()->latest('published_at')->paginate(12),
        ]);
    }

    public function video(Video $video)
    {
        abort_unless($video->isPublished(), 404);

        return view('videos.show', compact('video'));
    }

    public function about()
    {
        return view('about', [
            'page' => Page::where('slug', 'about')->firstOrFail(),
        ]);
    }
}