<?php

declare(strict_types=1);

namespace Tests\Feature\Frontend\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\{Category, Concentration, Product};

class Test extends TestCase
{
    use RefreshDatabase;

    /**
     * Index page test.
     *
     * @return void
     */
    public function testIndex(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('frontend.product.index'));
        $response->assertStatus(200);
        // $response->assertSee('__invoke');
        $response->assertSeeText('produkty');
        $response->assertViewIs('frontend.product.index');
        $response->assertViewHas('currentRouteName');
    }

    public function testShow(): void
    {
        $this->withoutExceptionHandling();
        $category = factory(Category::class)->create();
        $contentration = factory(Concentration::class)->create();
        $product = factory(Product::class)->create(
            [
                'category_id' => $category->id,
                'concentration_id' => $contentration->id
            ]
        );
        $response = $this->get(route('frontend.product.show', $product));
        $response->assertStatus(200);
        // $response->assertSee('__invoke');
        // $response->assertSeeText('blog');
        $response->assertViewIs('frontend.product.show');
        $response->assertViewHas('currentRouteName');
    }
}
