<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get the edition that owns the category.
     * 
     * @return BelongsTo
     */
    /*
    public function edition(): BelongsTo
    {
        return $this->belongsTo('App\Edition');
    }
    */

    /**
     * Get the concentrations for the category.
     * 
     * @return HasMany
     */
    /*
    public function concentrations(): HasMany
    {
        return $this->hasMany('App\Models\Concentration');
    }
    */
    
    /**
     * Get the products for the category.
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
