<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany, MorphTo};

class Order extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'orderable_id',
        'orderable_type',
        'status_id',
        'sale_document_id',
        'total_price',
        'delivery_cost',
        'total_price_and_delivery_cost',
        'delivery_name',
        'comment'
    ];

    public function orderable(): MorphTo
    {
        return $this->morphTo();
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function saleDocument(): BelongsTo
    {
        return $this->belongsTo(SaleDocument::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
