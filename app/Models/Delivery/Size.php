<?php

declare(strict_types=1);

namespace App\Models\Delivery;

use App\Services\Basket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Ramsey\Uuid\Type\Decimal;

/**
 * Product size
 */
class Size extends Model
{
    /**
     * Get the costs for the size.
     * 
     * @return HasMany
     */
    public function costs(): HasMany
    {
        return $this->hasMany('App\Models\Delivery\Cost');
    }
}
