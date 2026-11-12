<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use App\Models\Video;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $q = trim($request->string('q'));
        $results = collect();

        if (strlen($q) >= 2) {
            $results = [
                'posts'  => Post::search($q)->query(fn ($b) => $b->published())->get(),
                'videos' => Video::search($q)->query(fn ($b) => $b->published())->get(),
                'pages'  => Page::search($q)->get(),
            ];
        }
        return view('search', compact('q', 'results'));
    }
}