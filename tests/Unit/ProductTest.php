<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use App\Models\Product\{Brand, Category, Concentration, Product};

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeProduct(): void
    {
        $product = Product::factory()->make();

        $this->assertInstanceOf(Product::class, $product);
    }

    public function testCreateProduct(): void
    {
        $product = Product::factory()
            ->for(Brand::factory())
            ->for(Category::factory())
            ->for(Concentration::factory())
            ->create();

        $this->assertDatabaseHas('products', [
            'slug' => $product->slug,
            'name' => $product->name,
            'description' => $product->description,
            'img' => $product->img,
            'site_description' => $product->site_description,
            'site_keyword' => $product->site_keyword,
            'hide' => $product->hide,
        ]);
    }

    public function testProductBelongsToBrand(): void
    {
        $product = Product::factory()
            ->for(Brand::factory())
            ->for(Category::factory())
            ->for(Concentration::factory())
            ->create();
        $brand = $product->brand;

        $this->assertInstanceOf(Brand::class, $brand);
    }

    public function testProductBelongsToCategory(): void
    {
        $product = Product::factory()
            ->for(Brand::factory())
            ->for(Category::factory())
            ->for(Concentration::factory())
            ->create();
        $category = $product->category;

        $this->assertInstanceOf(Category::class, $category);
    }

    public function testProductBelongsToConcentration(): void
    {
        $product = Product::factory()
            ->for(Brand::factory())
            ->for(Category::factory())
            ->for(Concentration::factory())
            ->create();
        $concentration = $product->concentration;

        $this->assertInstanceOf(Category::class, $concentration);
    }

    public function testProductHasManyTypes(): void
    {
        $product = Product::factory()
            ->for(Brand::factory())
            ->for(Category::factory())
            ->for(Concentration::factory())
            ->create();
        $types = $product->types;

        $this->assertInstanceOf(Collection::class, $types);
    }
}
