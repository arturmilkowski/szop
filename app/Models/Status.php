<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    /**
     * Get the orders for the status.
     *
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany('App\Models\Order');
    }
}