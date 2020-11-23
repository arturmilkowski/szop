<?php

declare(strict_types=1);

namespace Tests\Feature\Frontend;

use Tests\TestCase;
use App\Models\{Category, Concentration, Product, Type};
use App\Models\Delivery\{Delivery, Method, Cost};
use App\Models\Product\Size;

abstract class CreateType extends TestCase
{
    protected $typeID;

    /**
     * Add products to database.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $category = factory(Category::class)->create();
        $concentration = factory(Concentration::class)
            ->create(['category_id' => $category->id]);
        $product = factory(Product::class)
            ->create(
                [
                    'category_id' => $category->id,
                    'concentration_id' => $concentration->id
                ]
            );
        $size = factory(Size::class)->create();
        $type = factory(Type::class)->create(
            [
                'product_id' => $product->id,
                'size_id' => $size->id,
            ]
        );
        $this->typeID = $type->id;

        $delivery = factory(Delivery::class)->create();
        $method = factory(Method::class)->create(['delivery_id' => $delivery->id]);
        factory(Cost::class)->create(['method_id' => $method->id]);
    }
}
