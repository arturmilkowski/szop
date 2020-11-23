<?php

declare(strict_types = 1);

namespace Tests\Unit\Order;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany, MorphTo};
use App\Models\{Status, SaleDocument, Order, Item};

class OrderTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Order has status test.
     *
     * @return void
     */
    public function testOrderBelongsToStatus(): void
    {
        $this->withoutExceptionHandling();
        
        $order = factory(Order::class)->make();

        $this->assertInstanceOf(BelongsTo::class, $order->status());
    }

    /**
     * Order belongs to sale document test.
     *
     * @return void
     */
    public function testOrderBelongsToSaleDocument(): void
    {
        $this->withoutExceptionHandling();
        
        $order = factory(Order::class)->make();

        $this->assertInstanceOf(BelongsTo::class, $order->saleDocument());
    }

    /**
     * Order has many order's item.
     *
     * @return void
     */
    public function testOrderHasManyItems(): void
    {
        $this->withoutExceptionHandling();
        
        $order = factory(Order::class)->make();

        $this->assertInstanceOf(HasMany::class, $order->items());
    }

    /**
     * Order morph to orderable model.
     *
     * @return void
     */
    public function testOrderMorphTo(): void
    {
        $this->withoutExceptionHandling();
        
        $order = factory(Order::class)->make();

        $this->assertInstanceOf(MorphTo::class, $order->orderable());
    }

    public function __testOrderQuantityOfProducts(): void
    {
        $this->withoutExceptionHandling();
        
        $order = factory(Order::class)->create();
        dd($order);
        // $item = factory(Item::class)->make(['order_id' => $order->id]);
        // dd($item);
    }
}
