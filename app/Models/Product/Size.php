<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
        'description',        
    ];

    public function types(): HasMany
    {
        return $this->hasMany(Type::class);
    }
}
