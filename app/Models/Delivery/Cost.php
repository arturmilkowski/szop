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
 * Delivery method cost.
 */
class Cost extends Model
{
    /**
     * Get the method that owns the cost.
     * 
     * @return BelongsTo
     */
    public function method(): BelongsTo
    {
        return $this->belongsTo('App\Models\Delivery\Method');
    }

    /**
     * Get the size that owns the cost.
     * 
     * @return BelongsTo
     */
    public function size(): BelongsTo
    {
        return $this->belongsTo('App\Models\Delivery\Size');
    }

    /**
     * Get the orders for the cost.
     * 
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany('App\Models\Order');
    }

    /**
     * Calculate shipping cost.
     *
     * @param integer $methodID Shipping method
     * @param Basket  $basket   Basket
     * 
     * @return float
     */
    public function calculate(int $methodID, Basket $basket): float
    {
        $piece = $basket->productsCount();

        if ($piece > 1) {
            return $this->calculateForMany($methodID, $basket);
        }

        return $this->calculateForOne($methodID, $basket);
    }

    /**
     * One item in basket.
     *
     * @param integer $methodID Shipping method
     * @param Basket  $basket   Basket
     * 
     * @return float
     */
    private function calculateForOne(int $methodID, Basket $basket): float
    {
        $sizeID = 0;
        foreach ($basket->getItems() as $item) {
            $sizeID = $item->type_size_id;
        }

        return $this->getCost($methodID, (int) $sizeID);
    }

    /**
     * More then one item in basket.
     *
     * @param integer $methodID Shipping method
     * @param Basket  $basket   Basket
     * 
     * @return float
     */
    private function calculateForMany(int $methodID, Basket $basket): float
    {
        // search max id. it means it is largest size which is moore expensive
        $sizes = [];
        foreach ($basket->getItems() as $item) {
            $sizes[] = $item->type_size_id;
        }
        $maxSizeID = max($sizes);

        return $this->getCost($methodID, $maxSizeID);
    }

    /**
     * Get shiping cost by method and size.
     *
     * @param integer $methodID Shipping method
     * @param integer $sizeID   Size ID
     * 
     * @return float
     */
    private function getCost(int $methodID, int $sizeID): float
    {
        $cost = DB::table('costs')
            ->where(
                [
                    ['method_id', '=', $methodID],
                    ['size_id', '=', $sizeID],
                ]
            )->value('cost');
                    
        if ($cost == null) {
            return 0.0;
        }

        return floatval($cost);
    }
}
