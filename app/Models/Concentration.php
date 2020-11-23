<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Concentration extends Model
{
    use HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];  // 'category_id',

    /**
     * Get the category that owns the concentration.
     * 
     * @return BelongsTo
     */
    /*
    public function category(): BelongsTo
    {
        return $this->belongsTo('App\Models\Category');
    }
    */

    /**
     * Get the products for the concentration.
     * 
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany('App\Models\Product');
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
