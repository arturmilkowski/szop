<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product\{Brand, Category, Concentration, Product};

class AdminProductTest extends TestCase
{
    use RefreshDatabase;

    private $product;

    public function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        $this->actingAs($user);
        $this->product = Product::factory()
            ->for(Brand::factory())
            ->for(Category::factory())
            ->for(Concentration::factory())
            ->create();
    }

    public function testIndex(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.products.products.index'));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.product.index');
        // $response->assertSeeText('Koncentracje');
    }

    public function testCreate(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.products.products.create'));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.product.create');
        $response->assertSeeText('Dodawanie');
    }

    public function testStore(): void
    {
        $this->withoutExceptionHandling();
        $item = Product::factory()->make();
        $response = $this->post(route('backend.admins.products.products.store', $item->toArray()));
        $response->assertStatus(302);
        $this->assertDatabaseHas('products', ['name' => $item->name]);
    }

    public function testStoreWithValidationError(): void
    {
        $item = Product::factory()->make(['name' => '']);
        $response = $this->post(route('backend.admins.products.products.store', $item->toArray()));
        $response->assertStatus(302);
        $response->assertInvalid(['name' => 'The name field is required.']);
        $this->assertDatabaseMissing('products', ['name' => $item->name]);
    }

    /*
    public function testStoreWithDuplicateValidationError(): void
    {
        $item = Concentration::factory()->make();
        $response = $this->post(route('backend.admins.products.products.store', $item->toArray()));
        $response = $this->post(route('backend.admins.products.products.store', $item->toArray()));
        $response->assertInvalid(['name' => 'The name has already been taken.']);
    }
    */

    public function testShow(): void
    {
        $this->withoutExceptionHandling();
        $item = $this->product; // Concentration::factory()->create();
        $response = $this->get(route('backend.admins.products.products.show', $item));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.product.show');
        // $response->assertSeeText('Produkt');
    }

    public function testEdit(): void
    {
        $this->withoutExceptionHandling();
        $item = $this->product; // Concentration::factory()->create();
        $response = $this->get(route('backend.admins.products.products.edit', $item));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.product.edit');
        // $response->assertSeeText('Edycja');
    }

    public function testUpdate(): void
    {
        $this->withoutExceptionHandling();
        $item = $this->product; // Concentration::factory()->create();
        $item1 = Product::factory()->make();
        $response = $this->put(route('backend.admins.products.products.update', $item), $item1->toArray());
        $response->assertStatus(302);
        $this->assertDatabaseHas('products', ['name' => $item1->name]);
    }

    public function testUpdateWithValidationError(): void
    {
        $item = $this->product; // Concentration::factory()->create();
        $item1 = Product::factory()->make(['name' => '']);
        $response = $this->put(route('backend.admins.products.products.update', $item), $item1->toArray());
        $response->assertInvalid(['name' => 'The name field is required.']);
        $this->assertDatabaseMissing('products', ['name' => $item1->name]);
    }

    public function testDestroy(): void
    {
        $this->withoutExceptionHandling();        
        $item = $this->product; // Concentration::factory()->create();
        $response = $this->delete(route('backend.admins.products.products.destroy', $item));
        $response->assertStatus(302);
        $this->assertDatabaseMissing('products', ['name' => $item->name]);
    }
}
