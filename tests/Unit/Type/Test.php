<?php

declare(strict_types=1);

namespace Tests\Unit\Type;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use App\Models\{Category, Concentration, Type, Product};
use App\Models\Product\Size;

class Test extends TestCase
{
    use RefreshDatabase;

    /**
     * A Type unit test.
     *
     * @return void
     */
    public function testType(): void
    {
        $this->withoutExceptionHandling();

        $category = factory(Category::class)->create();
        $concentration = factory(Concentration::class)->create();
        $product = factory(Product::class)->create(
            [
                'category_id' => $category->id,
                'concentration_id' => $concentration->id
            ]
        );
        $size = factory(Size::class)->create();
        factory(Type::class)->create(
            [
                'product_id' => $product->id,
                'size_id' => $size->id,
            ]
        );
        $types = Type::all();

        $this->assertInstanceOf(Collection::class, $types);
        $this->assertInstanceOf(Type::class, $types[0]);
    }

    /**
     * A Type belongs to product unit test.
     *
     * @return void
     */
    public function testTypeBelongsToProduct(): void
    {
        $category = factory(Category::class)->create();
        $concentration = factory(Concentration::class)->create();
        $product = factory(Product::class)->create(
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
        // $type = factory(Type::class)->make(['product_id' => $product->id]);
        $product = $type->product;

        $this->assertInstanceOf(Product::class, $product);
    }

    /**
     * A type belongs to size.
     *
     * @return void
     */
    public function testTypeBelongsToSize(): void
    {
        $size = factory(Size::class)->create();
        $product = factory(Product::class)->make();
        $type = factory(Type::class)->create(
            [
                'product_id' => $product->id,
                'size_id' => $size->id
            ]
        );

        $this->assertInstanceOf(Size::class, $type->size);
    }

    /**
     * Type has promotion price.
     *
     * @return void
     */
    public function testTypeHasPromoPrice(): void
    {
        $size = factory(Size::class)->create();
        $product = factory(Product::class)->make();
        $type = factory(Type::class)->create(
            [
                'product_id' => $product->id,
                'size_id' => $size->id
            ]
        );

        $this->assertIsNumeric($type->promo_price);
    }

    /**
     * Type has hide field.
     * Do not show type if it set to true.
     *
     * @return void
     */
    public function testTypeHasHideField(): void
    {
        $size = factory(Size::class)->create();
        $product = factory(Product::class)->make();
        $type = factory(Type::class)->create(
            [
                'product_id' => $product->id,
                'size_id' => $size->id
            ]
        );

        $this->assertIsBool($type->hide);
    }
}
