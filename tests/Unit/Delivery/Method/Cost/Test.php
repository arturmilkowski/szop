<?php

declare(strict_types=1);

namespace Tests\Unit\Delivery\Method\Cost;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};
use App\Models\Delivery\{Delivery, Method, Cost};
use App\Models\{Category, Concentration, Product, Type};
use App\Models\Product\{Size, Brand};
use App\Services\Basket;
use Mockery;

class Test extends TestCase
{
    use RefreshDatabase;

    /**
     * Delivery cost belongs to delivery method;
     *
     * @return void
     */
    public function testCostBelongsToMethod(): void
    {
        $cost = factory(Cost::class)->make();

        $this->assertInstanceOf(BelongsTo::class, $cost->method());
    }

    /**
     * Delivery cost has many orders.
     *
     * @return void
     */
    public function testCostHasManyOrders(): void
    {
        $cost = factory(Cost::class)->make();

        $this->assertInstanceOf(HasMany::class, $cost->orders());
    }

    /**
     * Delivery cost gets delivery name.
     *
     * @return void
     */
    public function testCostGivesDeliveryName(): void
    {
        $cost = factory(Cost::class)->make();

        $deliveryName = $cost->method->delivery->display_name;

        $this->assertIsString($deliveryName);
    }

    public function testCalculateCost(): void
    {
        $cost = new Cost();
        $basket = new Basket();
        $category = factory(Category::class)->create();
        $brand = factory(Brand::class)->create();
        $concentration = factory(Concentration::class)->create();
        $size = factory(Size::class)->create();
        $product = factory(Product::class)->create(
            [
                'brand_id' => $brand->id,
                'category_id' => $category->id,
                'concentration_id' => $concentration->id
            ]
        );
        $type = factory(Type::class)->create(
            [
                'product_id' => $product->id,
                'size_id' => 1, // $size->id,
            ]
        );
        $basket->add($type);

        
        $this->addDeliveries();
        
        $methodID = 1;
        $calculatedCost = $cost->calculate($methodID, $basket);        
        $this->assertEquals(5, $calculatedCost);
    }

    private function addDeliveries()
    {
        $delivery1 = factory(Delivery::class)->create(
            ['name' => 'poczta-polska', 'display_name' => 'poczta polska',]
        );
        
        $method1 = factory(Method::class)->create(
            [
                'delivery_id' => $delivery1->id,
                'name' => 'paczka',
                'display_name' => 'paczka'
            ]
        );
        $method2 = factory(Method::class)->create(
            [
                'delivery_id' => $delivery1->id,
                'name' => 'list-polecony',
                'display_name' => 'list polecony'
            ]
        );
        
        $size = factory(Size::class)->create(
            [
                'name' => 'xxxs',
                'display_name' => 'bardzo mały'
            ]
        );
        $size = factory(Size::class)->create(
            [
                'name' => 'xxs',
                'display_name' => 'mały'
            ]
        );
                
        $cost1 = factory(Cost::class)->create(
            [
                'method_id' => $method1->id,
                'size_id' => 1,
                'cost' => 5.00
            ]
        );
        $cost2 = factory(Cost::class)->create(
            [
                'method_id' => $method1->id,
                'size_id' => 2,
                'cost' => 15.00
            ]
        );

        $delivery2 = factory(Delivery::class)->create(
            ['name' => 'in-post', 'display_name' => 'in post',]
        );
        $method3 = factory(Method::class)->create(
            [
                'delivery_id' => $delivery2->id,
                'name' => 'paczkomat',
                'display_name' => 'paczkomat'
            ]
        );
    }
}
