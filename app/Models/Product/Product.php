<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};
use Illuminate\Support\Facades\Cache;

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
        return $this->belongsTo(Concentration::class);
    }

    public function types(): HasMany
    {
        return $this->hasMany(Type::class);
    }

    protected static function booted(): void
    {
        static::created(function () {
            Cache::forget('products');
        });
        static::updated(function () {
            Cache::forget('products');
        });
        static::deleted(function () {
            Cache::forget('products');
        });
    }
}
