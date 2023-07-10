<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'user_id',
        // 'tag_id',
        'title',
        'intro',
        'content',
        'img',
        'site_description',
        'site_keyword',
        'approved',
        'published'
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
