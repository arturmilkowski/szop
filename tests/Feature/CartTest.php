<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product\{Brand, Category, Concentration, Product, Size, Type};

class CartTest extends TestCase
{
    use RefreshDatabase;

    protected $type;

    public function setUp(): void
    {
        parent::setUp();

        $product = Product::factory()
            ->for(Brand::factory())
            ->for(Category::factory())
            ->for(Concentration::factory())
            ->create();
        $this->type = Type::factory()
            ->for($product)
            ->for(Size::factory())
            ->create();
    }

    public function testStoreProduct()
    {
        $this->withoutExceptionHandling();
        $response = $this->post(route('cart.store', $this->type));

        $response->assertStatus(302);
        // $response->assertSessionHas(
        //     'message', config('settings.ui.backend.messages.added')
        // );
    }

    public function testDestroyProduct(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->delete(route('cart.destroy', $this->type));

        $response->assertStatus(302);
        // $response->assertSessionHas(
        //     'message',
        //     config('settings.ui.backend.messages.removed')
        // );
    }

    public function testDestroyAllProducts(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('cart.destroy.all'));

        $response->assertStatus(302);
        // $response->assertSessionHas(
        //     'message',
        //     config('settings.ui.backend.messages.removed')
        // );
    }
}
