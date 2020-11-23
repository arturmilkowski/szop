<?php

declare(strict_types=1);

namespace Tests\Unit\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Collection;
// use Illuminate\Database\Eloquent\Collection;
use App\Models\{Product, Concentration, Category};
use App\Models\Product\Review;

class ReviewTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Basic test.
     *
     * @return void
     */
    public function testReview(): void
    {
        $this->assertInstanceOf(Collection::class, Review::all());
    }

    /**
     * Review belongs to product.
     *
     * @return void
     */
    public function testReviewBelongsToProduct(): void
    {
        $category = factory(Category::class)->create();
        $concentration = factory(Concentration::class)->create();
        $product = factory(Product::class)->create(
            [
                'category_id' => $category->id,
                'concentration_id' => $concentration->id
            ]
        );
        $review = factory(Review::class)->make();
        $productReview = $product->reviews;

        $this->assertInstanceOf(Collection::class, $productReview);
    }
}
