<?php

declare(strict_types = 1);

namespace App\Models\Delivery;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Delivery extends Model
{
    /**
     * Get the methods for the delivery.
     * 
     * @return HasMany
     */
    public function methods(): HasMany
    {
        return $this->hasMany('App\Models\Delivery\Method');
    }
}
