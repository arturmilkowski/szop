<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Type extends Model
{
    use HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'size_id',
        // 'slug',
        'name',
        'price',
        'promo_price',
        'quantity',
        'hide',
        'description',
        // 'img',
    ];

    /**
     * Get the product that owns the type.
     * 
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo('App\Models\Product');
    }

    /**
     * Get the size that owns the type.
     * 
     * @return BelongsTo
     */
    public function size(): BelongsTo
    {
        return $this->belongsTo('App\Models\Product\Size');
    }

    /**
     * Check if product type is in stock.
     *
     * @return boolean
     */
    public function isInStock(): bool
    {
        if ($this->quantity == 0) {
            return false;
        }

        return true;
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
}
