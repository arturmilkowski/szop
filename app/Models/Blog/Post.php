<?php

declare(strict_types=1);

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany, BelongsToMany};
use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Collection;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'tag_id',
        'title',
        'intro',
        'content',
        'img',
        'site_description',
        'site_keyword',
        'approved',
        'published'
    ];

    /**
     * Get the post's approved value.
     *
     * @param string $value Value
     * 
     * @return string
     */
    /*
    public function getApprovedAttribute(string $value): string
    {
        if ($value == 0) {
            return 'nie';
        }

        return 'tak';
    }
    */
    /**
     * Get the post's published value.
     *
     * @param string $value Value
     * 
     * @return string
     */
    /*
    public function getPublishedAttribute(string $value): string
    {
        if ($value == 0) {
            return 'nie';
        }

        return 'tak';
    }
    */

    /**
     * Get the author of the post.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the tag that owns the post.
     * 
     * @return BelongsTo
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Blog\Tag')->orderBy('id');
    }

    /**
     * Get the comments for the post.
     * 
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany('App\Models\Blog\Comment');
    }

    /**
     * Get the options for generating the slug.
     *
     * @return SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
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

    /**
     * Scope a query to only include published posts.
     *
     * @param Builder $query Bulider
     * 
     * @return Builder
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published', 1);
    }
}
