<?php

declare(strict_types = 1);

namespace Tests\Unit\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Product\Brand;
// use App\Models\Product;

class BrandTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A brand base unit test.
     *
     * @return void
     */
    public function testBrand(): void
    {
        factory(Brand::class)->create();
        $brands = Brand::all();
        $brand = Brand::first();

        $this->assertInstanceOf(Collection::class, $brands);
        $this->assertInstanceOf(Brand::class, $brand);
    }

    /**
     * Brand has many products unit test.
     *
     * @return void
     */
    public function testBrandHasManyProducts(): void
    {
        $brand = factory(Brand::class)->create();
        $products = $brand->products;

        $this->assertInstanceOf(Collection::class, $products);
    }
}
