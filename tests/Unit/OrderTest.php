<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Order\{SaleDocument, Status, Order, Item};
use App\Models\Customer\Customer;
use App\Models\User;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeOrder(): void
    {
        $order = Order::factory()->make();

        $this->assertInstanceOf(Order::class, $order);
    }

    public function testCreateOrder(): void
    {
        $status = Status::factory()->create();
        $saleDocument = SaleDocument::factory()->create();
        $order = Order::factory()
            ->for($status)
            ->for($saleDocument)
            ->for(Customer::factory(), 'orderable')
            ->create();
        $this->assertDatabaseHas('orders', [
            'status_id' => $order->status->id,
            'sale_document_id' => $saleDocument->id,
            'total_price' => $order->total_price,
            'delivery_cost' => $order->delivery_cost,
            'total_price_and_delivery_cost' => $order->total_price_and_delivery_cost,
            'delivery_name' => $order->delivery_name,
            'comment' => $order->comment,
        ]);
    }

    public function testOrderBelongsToStatus(): void
    {
        $order = Order::factory()
            ->for(Status::factory())
            ->for(SaleDocument::factory())
            ->for(Customer::factory(), 'orderable')
            ->create();

        $this->assertInstanceOf(Status::class, $order->status);
    }

    public function testOrderBelongsToUser(): void
    {
        $user = User::factory()->create();
        $order = Order::factory()
            ->for(Status::factory())
            ->for(SaleDocument::factory())
            ->for($user, 'orderable')
            ->create();

        $this->assertSame($user->name, $order->orderable->name);
    }

    public function testOrderBelongsToSaleDocument(): void
    {
        $this->withoutExceptionHandling();

        $order = Order::factory()
            ->for(Status::factory())
            ->for(SaleDocument::factory())
            ->for(Customer::factory(), 'orderable')
            ->create();

        $this->assertInstanceOf(SaleDocument::class, $order->saleDocument);
    }

    public function testOrderBelongsToCustomer(): void
    {
        $this->withoutExceptionHandling();

        $order = Order::factory()
            ->for(Status::factory())
            ->for(SaleDocument::factory())
            ->for(Customer::factory(), 'orderable')
            ->create();

        $this->assertInstanceOf(Customer::class, $order->orderable);
    }

    public function testOrderHasManyItems(): void
    {
        $this->withoutExceptionHandling();
        $item = Item::factory()->make();
        $order = Order::factory()
            ->for(Status::factory())
            ->for(SaleDocument::factory())
            ->for(Customer::factory(), 'orderable')
            ->create();

        $this->assertInstanceOf(Collection::class, $order->items);
    }

    /*
    public function testOrderCanSaveItems(): void
    {
        $this->withoutExceptionHandling();
        $item = Item::factory();
        $order = Order::factory()
            ->for(Status::factory())
            ->for(SaleDocument::factory())
            ->for(Customer::factory(), 'orderable')
            ->has($item)
            ->create();

        $success = $order->items()->saveMany($item);
        dd($success);
    }
    */
}
