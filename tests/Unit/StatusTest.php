<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use App\Models\Order\{Status, Order};
use App\Models\Order\SaleDocument;
use App\Models\Customer\Customer;

class StatusTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeOrder(): void
    {
        $status = Status::factory()->make();

        $this->assertInstanceOf(Status::class, $status);
    }

    public function testCreateOrder(): void
    {
        $status = Status::factory()->create();

        $this->assertDatabaseHas('statuses', [
            'slug' => $status->slug,
            'name' => $status->name,
            'description' => $status->description,
        ]);
    }

    /*
    public function testStatusHasManyOrders(): void
    {
        $status = Status::factory()
            ->has(
                Order::factory()
                    ->for(SaleDocument::factory())
                    ->for(Customer::factory(), 'orderable')
            )
            ->create();

        $this->assertInstanceOf(Collection::class, $status->orders);
    }
    */
}
