<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'category_id',
        'concentration_id',
        'slug',
        'name',
        'description',
        'img',
        'site_description',
        'site_keyword',
        'hide'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function concentration(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function types(): HasMany
    {
        return $this->hasMany(Type::class);
    }
}
