<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;
    protected $fillable = ['title','slug','excerpt','content','cover_image','published_at'];
    protected $casts = ['published_at' => 'datetime'];

    public function scopePublished($q)
    {
        return $q->whereNotNull('published_at')->where('published_at', '<=', now());
    }

    public function toSearchableArray(): array
    {
        return ['title' => $this->title, 'excerpt' => strip_tags((string) $this->excerpt)];
    }
}