<?php

declare(strict_types = 1);

namespace Tests\Unit\Delivery\Method;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Collection;
use App\Models\Delivery\Method;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Test extends TestCase
{
    use RefreshDatabase;

    /**
     * Delivery methods are the collection.
     *
     * @return void
     */
    public function testAllMethodsAreCollection(): void
    {
        factory(Method::class)->make();
        $deliveryMethods = Method::all();

        $this->assertInstanceOf(Collection::class, $deliveryMethods);
    }

    /**
     * Find delivery method unit test.
     *
     * @return void
     */
    public function testFindMethod(): void
    {
        factory(Method::class)->create();
        $deliveryMethod = Method::first();
        
        $this->assertInstanceOf(Method::class, $deliveryMethod);
    }

    /**
     * Method belongs to delivery.
     *
     * @return void
     */
    public function testMethodBelongsToDelivery(): void
    {
        $method = factory(Method::class)->create();

        $this->assertInstanceOf(BelongsTo::class, $method->delivery());
    }

    /**
     * Delivery method has meny costs.
     *
     * @return void
     */
    public function testMethodHasManyCosts(): void
    {
        $method = factory(Method::class)->create();

        $this->assertInstanceOf(HasMany::class, $method->costs());
    }
}
