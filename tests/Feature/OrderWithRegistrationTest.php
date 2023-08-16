<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product\{Brand, Category, Concentration, Product, Size, Type};

class OrderWithRegistrationTest extends TestCase
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

    public function testCreate(): void
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $response = $this->actingAs($user);
        // add product to a basket
        $response = $this->post(route('cart.store', [$this->type]));
        $response = $this->get(route('orders.with-registration.create'));

        $response->assertStatus(200);
    }

    /*
    public function testStore(): void
    {
        $this->withoutExceptionHandling();
    }
    */
}
