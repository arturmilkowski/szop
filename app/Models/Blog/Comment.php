<?php

declare(strict_types=1);

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};
use Illuminate\Database\Eloquent\Builder;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',
        'user_id',
        'ip',
        'agent',
        'content',
        'author',
        'approved',
    ];

    /**
     * Get the post that owns the comment.
     * 
     * @return BelongsTo
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo('App\Models\Blog\Post');
    }

    /**
     * Get the replies for the comment.
     * 
     * @return HasMany
     */
    public function replies(): HasMany
    {
        return $this->hasMany('App\Models\Blog\Reply');
    }

    /**
     * Scope a query to only include approved posts.
     *
     * @param Builder $query Bulider
     * 
     * @return Builder
     */
    public function scopeApproved(Builder $query): Builder
    {
        return $query->where('approved', 1);
    }
}
