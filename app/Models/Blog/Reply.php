<?php

declare(strict_types=1);

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reply extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment_id',
        'user_id',
        'content',
        'author',
        'approved',
    ];

    /**
     * Get the comment that owns the reply.
     * 
     * @return BelongsTo
     */
    public function comment(): BelongsTo
    {
        return $this->belongsTo('App\Models\Blog\Comment');
    }
}
