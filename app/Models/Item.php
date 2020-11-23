<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Order item.
 */
class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'type_id',
        'type_size_id',
        'type_name',
        'name',
        'concentration',
        'category',
        'price',
        'quantity',
        'subtotal_price'
    ];

    /**
     * Get the order that owns the item.
     *
     * @return BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo('App\Models\Order');
    }
}
