<?php

declare(strict_types = 1);

namespace App\Models\Delivery;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Delivery method.
 */
class Method extends Model
{
    /**
     * Get the delivery that owns the method.
     * 
     * @return BelongsTo
     */
    public function delivery(): BelongsTo
    {
        return $this->belongsTo('App\Models\Delivery\Delivery');
    }

    /**
     * Get the costs for the method.
     * 
     * @return HasMany
     */
    public function costs(): HasMany
    {
        return $this->hasMany('App\Models\Delivery\Cost');
    }
}
