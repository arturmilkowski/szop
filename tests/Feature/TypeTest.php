<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\{Category, Concentration, Product, Type};
// use App\Models\Delivery\{Delivery, Method, Cost};
use App\Models\Product\Size;

trait TypeTest
{
    public $product, $type;

    /**
     * Add products to database.
     *
     * @return void
     */
    public function typeTest(): void
    {
        $category = factory(Category::class)->create();
        $concentration = factory(Concentration::class)->create(
            ['category_id' => $category->id]
        );
        $product = factory(Product::class)->create(
            ['category_id' => $category, 'concentration_id' => $concentration->id]
        );
        $size = factory(Size::class)->create();
        $type = factory(Type::class)->create(
            [
                'product_id' => $product->id,
                'size_id' => $size->id,
            ]
        );

        $this->product = $product;
        $this->type = $type;
    }
}
