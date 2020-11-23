<?php

declare(strict_types=1);

namespace Tests\Unit\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Collection;
use App\Models\{Product, Concentration, Category};
use App\Models\Product\Brand;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A product unit test.
     *
     * @return void
     */
    public function testProduct(): void
    {
        $products = Product::all();

        $this->assertInstanceOf(Collection::class, $products);
    }

    /**
     * Product belongs to brand unit test.
     *
     * @return void
     */
    public function testProductBelongsToBrand(): void
    {
        $brand = factory(Brand::class)->create();
        $category = factory(Category::class)->create();
        $product = factory(Product::class)->make(
            [
                'brand_id' => $brand->id,
                'category_id' => $category->id
            ]
        );
        $brand = $product->brand;

        $this->assertInstanceOf(Brand::class, $brand);
    }

    /**
     * A product belongs to category unit test.
     *
     * @return void
     */
    public function testProductBelongsToCategory(): void
    {
        $category = factory(Category::class)->create();
        $product = factory(Product::class)->make(['category_id' => $category->id]);
        $category = $product->category;

        $this->assertInstanceOf(Category::class, $category);
    }

    /**
     * A product belongs to concentration unit test.
     *
     * @return void
     */
    public function testProductBelongsToConcentration(): void
    {
        $category = factory(Category::class)->create();
        $concentration = factory(Concentration::class)->create();
        $product = factory(Product::class)->make(
            [
                'category_id' => $category->id,
                'concentration_id' => $concentration->id
            ]
        );
        $concentration = $product->concentration;

        $this->assertInstanceOf(Concentration::class, $concentration);
    }

    /**
     * A product has many types.
     *
     * @return void
     */
    public function testProductHasManyTypes(): void
    {
        $category = factory(Category::class)->create();
        $concentration = factory(Concentration::class)->create();
        $product = factory(Product::class)->make(
            [
                'category_id' => $category->id,
                'concentration_id' => $concentration->id
            ]
        );
        $types = $product->types;

        $this->assertInstanceOf(Collection::class, $types);
    }
    
    /**
     * Product has many reviews.
     *
     * @return void
     */
    public function testProductHasManyReviews(): void
    {
        $category = factory(Category::class)->create();
        $concentration = factory(Concentration::class)->create();
        $product = factory(Product::class)->create(
            [
                'category_id' => $category->id,
                'concentration_id' => $concentration->id
            ]
        );
        $reviews = $product->reviews;

        $this->assertInstanceOf(Collection::class, $reviews);
    }
    
    /**
     * Get product by ID.
     *
     * @param integer $productID Product ID
     * 
     * @return Product
     */
    private function getProduct(int $productID): Product
    {
        return Product::find($productID);
    }
}
