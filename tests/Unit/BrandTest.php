<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use App\Models\Product\{Brand, Category, Concentration, Product};

class BrandTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeBrand(): void
    {
        $brand = Brand::factory()->make();

        $this->assertInstanceOf(Brand::class, $brand);
    }

    public function testCreateBrand(): void
    {
        $brand = Brand::factory()->create();

        $this->assertDatabaseHas('brands', [
            'slug' => $brand->slug,
            'name' => $brand->name,
        ]);
    }

    public function testBrandHasManyProducts(): void
    {
        $brand = Brand::factory()
            ->has(
                Product::factory()
                    ->for(Category::factory())
                    ->for(Concentration::factory())
            )
            ->create();
        $products = $brand->products;

        $this->assertInstanceOf(Collection::class, $products);
    }
}
