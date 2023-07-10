<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SaleDocument extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'name', 'description'];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
