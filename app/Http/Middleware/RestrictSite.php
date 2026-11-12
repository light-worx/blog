<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictSite
{
    public function handle(Request $request, Closure $next): Response
    {
        if (config('site.public') || $request->user()) {
            return $next($request);
        }

        // 503 tells search engines this is temporary; noindex keeps the placeholder out of results.
        return response()
            ->view('offline', [], 503)
            ->header('Retry-After', '3600')
            ->header('X-Robots-Tag', 'noindex, nofollow');
    }
}
