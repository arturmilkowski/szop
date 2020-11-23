<?php

declare(strict_types = 1);

namespace Tests\Unit\Delivery;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Collection;
use App\Models\Delivery\Delivery;

class Test extends TestCase
{
    use RefreshDatabase;

    /**
     * All deliveries are the collection.
     *
     * @return void
     */
    public function testAllDeliveriesAreCollection(): void
    {
        factory(Delivery::class)->make();

        $deliveries = Delivery::all();

        $this->assertInstanceOf(Collection::class, $deliveries);
    }

    /**
     * Find first delivery unit test.
     *
     * @return void
     */
    public function testFindFirstDelivery(): void
    {
        factory(Delivery::class)->create();
        $delivery = Delivery::first();
        
        $this->assertInstanceOf(Delivery::class, $delivery);
    }

    /**
     * Delivery has many methods.
     *
     * @return void
     */
    public function testDeliveryHasManyMethods(): void
    {
        factory(Delivery::class)->create();
        $delivery = Delivery::first();
        $methods = $delivery->methods;

        $this->assertInstanceOf(Collection::class, $methods);
    }
}
