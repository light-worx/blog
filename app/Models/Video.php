<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Video extends Model
{
    use Searchable;
    protected $fillable = ['title','slug','youtube_url','description','published_at'];
    protected $casts = ['published_at' => 'datetime'];

    public function getYoutubeIdAttribute(): ?string
    {
        preg_match(
            '~(?:youtu\.be/|youtube\.com/(?:watch\?v=|embed/|shorts/))([\w-]{11})~',
            $this->youtube_url, $m
        );
        return $m[1] ?? null;
    }

    public function scopePublished($q)
    {
        return $q->whereNotNull('published_at')->where('published_at', '<=', now());
    }

    public function toSearchableArray(): array
    {
        return ['title' => $this->title, 'description' => strip_tags((string) $this->description)];
    }
}