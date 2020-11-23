<?php

declare(strict_types = 1);

namespace Tests\Unit\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Category;

class Test extends TestCase
{
    use RefreshDatabase;

    /**
     * A category unit test.
     *
     * @return void
     */
    public function testCategory(): void
    {
        factory(Category::class)->make();
        $categories = Category::all();

        $this->assertInstanceOf(Collection::class, $categories);
        // $this->assertCount(3, $categories);
    }

    /**
     * A category has many products unit test.
     *
     * @return void
     */
    public function testCategoryHasManyProducts(): void
    {
        $category = factory(Category::class)->make();
        $products = $category->products;

        $this->assertInstanceOf(Collection::class, $products);
    }

    /**
     * A category belongs to edition unit test.
     *
     * @return void
     */
    /*
    public function testCategoryBelongsToEdition(): void
    {
        $category = new Category();
        $firstCategory = $category->find(1);
        $edition = $firstCategory->edition;

        $this->assertInstanceOf(Edition::class, $edition);
    }
    */

    /**
     * A category has many concentrations unit test.
     *
     * @return void
     */
    public function testCategoryHasManyConcentrations(): void
    {
        $category = factory(Category::class)->make();
        $concentrations = $category->concentrations;

        $this->assertInstanceOf(Collection::class, $concentrations);
    }
}
