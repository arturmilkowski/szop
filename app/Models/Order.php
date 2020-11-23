<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\{HasMany, MorphTo};
use App\User;
use App\Services\Basket;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'orderable_id',
        'orderable_type',
        'status_id',
        'sale_document_id',
        'number',
        'total_price',
        'delivery_cost',
        'total_price_and_delivery_cost',
        'delivery_name',
        'comment'
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status_id' => 1,
        'sale_document_id' => 1,
    ];

    /**
     * Get the status that owns the order.
     * 
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo('App\Models\Status');
    }

    /**
     * Get the sale document that owns the order.
     * 
     * @return BelongsTo
     */
    public function saleDocument(): BelongsTo
    {
        return $this->belongsTo('App\Models\SaleDocument');
    }

    /**
     * Get the items for the order.
     *
     * @return HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany('App\Models\Item');
    }

    /**
     * Get the owning orderable model.
     *
     * @return MorphTo
     */
    public function orderable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Quantity of products in order.
     *
     * @return integer
     */
    public function quantity(): int
    {
        return $this->hasMany('App\Models\Item')->count();
    }

    /**
     * Get the bill number.
     *
     * @return string Order ID + Order number
     */
    public function getBillNumberAttribute(): string
    {
        return "{$this->id}{$this->number}";
    }

    /**
     * Get invoice number.
     *
     * @return string User ID + Order number + Order ID
     */
    public function getInvoiceNumberAttribute(): string
    {
        return "{$this->number}{$this->id}";
    }

    /**
     * Create random numer.
     *
     * @return integer
     */
    public function setNumber(): int
    {
        return rand(10000, 99999);
    }

    /**
     * Assign necessary attributes.
     *
     * @param Basket      $basket         Basket
     * @param Order       $order          Order
     * @param int         $saleDocumentID Sale Document ID
     * @param string|null $comment        Comment
     * 
     * @return Order
     */
    public function setAttributes(
        Basket $basket,
        Order $order,
        int $saleDocumentID,
        ?string $comment
    ): Order {
        // TODO test it
        $order->number = $this->setNumber();
        $order->total_price = $basket->totalPrice();
        $order->delivery_cost = session()->get('delivery_cost');
        $order->total_price_and_delivery_cost
            = session()->get('total_price_and_delivery_cost');
        $order->delivery_name = session()->get('delivery_name');
        $order->comment = $comment;
        $order->sale_document_id = $saleDocumentID;

        return $order;
    }

    /**
     * Save customer's order.
     *
     * @param Customer $customer Customer
     * 
     * @return Order
     */
    public function saveCustomerOrder(Customer $customer): Order
    {
        return $customer->order()->save($this);
    }

    /**
     * Save user order
     *
     * @param User $user User
     * 
     * @return Order
     */
    public function saveUserOrder(User $user): Order
    {
        return $user->orders()->save($this);
    }

    /**
     * Save order item.
     *
     * @param array $items Order items
     * 
     * @return iterable
     */
    public function saveItems(array $items): iterable
    {
        // TODO make unit test
        return $this->items()->saveMany($items);
    }
}
