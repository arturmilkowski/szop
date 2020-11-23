<?php

declare(strict_types=1);

namespace Tests\Unit\Order\ShippingCost;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use App\Services\ShippingCost;
use App\Models\Delivery\{Delivery, Method, Cost};
use App\Models\Product\Size;
use App\Models\{Category, Concentration, Type, Product};
use App\Services\Basket;

class ShippingCostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Calculate shipping cost unit test.
     *
     * @return void
     */
    public function __test(): void  // SizeS
    {
        $delivery = $this->prepareDelivery();

        $basket = new Basket();
        $category = factory(Category::class)->create();
        $concentration = factory(Concentration::class)->create();
        $product = factory(Product::class)->create(
            [
                'category_id' => $category->id,
                'concentration_id' => $concentration->id
            ]
        );
        // $size = factory(Size::class)->create();
        $type = factory(Type::class)->create(
            [
                'product_id' => $product->id,
                'size_id' => 1, // $size->id,
            ]
        );
        $basket->add($type);


        $pocztaPolska = $delivery->first();
        $listPolecony = 1;
        // dd($pocztaPolska);
        $costModel = $pocztaPolska->methods[0]->costs[0];
        
        $calculate = $costModel->calculate($listPolecony, $basket);
        $priceForOneSizeXS = 5;
        $this->assertEquals($priceForOneSizeXS, $calculate);

        // --

        $type = factory(Type::class)->create(
            [
                'product_id' => $product->id,
                'size_id' => 1,
            ]
        );
        $basket->add($type);

        $calculate = $costModel->calculate($listPolecony, $basket);
        $priceForTwoSizeXS = 5;
        $this->assertEquals($priceForTwoSizeXS, $calculate);

        // --

        $type = factory(Type::class)->create(
            [
                'product_id' => $product->id,
                'size_id' => 2,
            ]
        );
        $basket->add($type);

        $calculate = $costModel->calculate($listPolecony, $basket);
        $priceForTwoSizeS = 15;
        $this->assertEquals($priceForTwoSizeS, $calculate);
    }

    public function __testSizeM(): void
    {
        $delivery = $this->prepareDelivery();
        $pocztaPolska = $delivery->find(1);
        $listPolecony = 1;
        // $productsCount = 1;
        $sizeM = 2;
        $costModel = $pocztaPolska->methods[0]->costs[0];

        $costCollection = $costModel
            ->methodID($listPolecony)
            ->size($sizeM)
            // ->piece($productsCount)
            ->select('cost')
            ->get();

        $deliveryCostFromDB = $costCollection[0]->cost;
        $expectedDeliveryCost = 15;

        $this->assertEquals($deliveryCostFromDB, $expectedDeliveryCost);
    }

    public function __testSizeSandM(): void
    {
        /* 
        jesli > 1
        zaznacz max cost dla kazdego rozmiaru
        */
        $delivery = $this->prepareDelivery();
        $pocztaPolska = $delivery->find(1);
        $listPolecony = 1;
        $productsCount = 2;
        $sizeM = 2;
        $costModel = $pocztaPolska->methods[0]->costs[0];

        $costCollection = $costModel
            ->methodID($listPolecony)
            ->size($sizeM)
            // ->piece($productsCount)
            ->select('cost')
            ->get();

        $deliveryCostFromDB = $costCollection[0]->cost;
        $expectedDeliveryCost = 15;

        $this->assertEquals($deliveryCostFromDB, $expectedDeliveryCost);
    }

    /**
     * Create delivery, method, product size and cost.
     *
     * @return Delivery
     */
    private function prepareDelivery(): Delivery
    {
        $delivery = factory(Delivery::class)->create(
            [
                'name' => 'poczta-polska',
                'display_name' => 'poczta polska',
                'description' => '',
            ]
        );

        $method = factory(Method::class)->create(
            [
                'delivery_id' => $delivery->id,
                'name' => 'list-polecony',
                'display_name' => 'list polecony',
                'description' => '',
            ]
        );

        $sizeS = factory(Size::class)->create(
            [
                'name' => 'xs',
                'display_name' => 'bardzo mały',
            ]
        );
        $sizeM = factory(Size::class)->create(
            [
                'name' => 's',
                'display_name' => 'mały',
            ]
        );

        $cost = factory(Cost::class)->create(
            [
                'method_id' => $method->id,
                'piece' => 1,
                'size_id' => 1,
                'cost' => 5.00,
                'description' => '',
            ]
        );
        $cost = factory(Cost::class)->create(
            [
                'method_id' => $method->id,
                'piece' => 5,
                'size_id' => 1,
                'cost' => 10,
                'description' => '',
            ]
        );
        $cost = factory(Cost::class)->create(
            [
                'method_id' => $method->id,
                'piece' => 10,
                'size_id' => 1,
                'cost' => 15,
                'description' => '',
            ]
        );
        $cost = factory(Cost::class)->create(
            [
                'method_id' => $method->id,
                'piece' => 100,
                'size_id' => 1,
                'cost' => 15.00,
                'description' => '',
            ]
        );

        $cost = factory(Cost::class)->create(
            [
                'method_id' => $method->id,
                'piece' => 1,
                'size_id' => 2,
                'cost' => 15.00,
                'description' => '',
            ]
        );
        $cost = factory(Cost::class)->create(
            [
                'method_id' => $method->id,
                'piece' => 2,
                'size_id' => 2,
                'cost' => 15.00,
                'description' => '',
            ]
        );

        return $delivery;
    }
}
