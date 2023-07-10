<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Order\{Status, Item, Order};
use App\Models\Customer\Customer;
use App\Models\Order\SaleDocument;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeOrderItem()
    {
        $this->withoutExceptionHandling();
        $item = Item::factory()->make();

        $this->assertInstanceOf(Item::class, $item);
    }

    /*
    public function testCreateOrderItem()
    {
        $this->withoutExceptionHandling();
        $item = Item::factory()
            ->for(
                Order::factory()
                    ->for(Status::factory())
                    ->for(SaleDocument::factory())
                    ->for(Customer::factory(), 'orderable')
            )
            ->create();

        $this->assertDatabaseHas('items', [
            'type_id' => $item->type_id,
            'type_name' => $item->type_name,
            'name' => $item->name,
            'concentration' => $item->concentration,
            'category' => $item->category,
            'price' => $item->price,
            'quantity' => $item->quantity,
            'subtotal_price' => $item->subtotal_price,
        ]);
    }

    public function testItemBelongsToOrder()
    {
        $this->withoutExceptionHandling();
        $item = Item::factory()
            ->for(
                Order::factory()
                    ->for(Status::factory())
                    ->for(SaleDocument::factory())
                    ->for(Customer::factory(), 'orderable')
            )
            ->create();

        $this->assertInstanceOf(Order::class, $item->order);
    }
    */
}
