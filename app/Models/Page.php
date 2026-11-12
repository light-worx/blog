<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Page extends Model
{
    use Searchable;
    protected $fillable = ['title','slug','content'];
    protected $casts = ['published_at' => 'datetime'];

    public function toSearchableArray(): array
    {
        return ['title' => $this->title, 'description' => strip_tags((string) $this->description)];
    }
}