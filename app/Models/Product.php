<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_id',
        'category_id',
        'concentration_id',
        'name',
        'description',
        'img',
        'site_description',
        'site_keyword',
        'hide'
    ];

    /**
     * Get the brand that owns the product.
     * 
     * @return BelongsTo
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo('App\Models\Product\Brand');
    }

    /**
     * Get the category that owns the product.
     * 
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * Get the concentration that owns the product.
     * 
     * @return BelongsTo
     */
    public function concentration(): BelongsTo
    {
        return $this->belongsTo('App\Models\Concentration');
    }

    /**
     * Get the types for the product.
     * 
     * @return HasMany
     */
    public function types(): HasMany
    {
        return $this->hasMany('App\Models\Type')->orderBy('created_at', 'desc');
    }

    /**
     * Get the reviews for the product.
     *
     * @return HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany('App\Models\Product\Review')
            ->orderBy('created_at', 'desc');
    }

    /**
     * Get the options for generating the slug.
     *
     * @return SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Scope a query to only include products of a given slug.
     *
     * @param Builder $query Builder
     * @param string  $slug  Slug
     * 
     * @return Builder
     */
    public function scopeBySlug($query, $slug): Builder
    {
        return $query->where('slug', $slug);
    }

    /**
     * Get products where hide is set to 0.
     *
     * @return Collection
     */
    public static function getActive(): Collection
    {
        return self::with(['concentration', 'category'])
            ->where('hide', 0)
            ->latest()
            ->get();
    }
}
