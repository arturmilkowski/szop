<?php

declare(strict_types = 1);

namespace Tests\Feature\Backend\Admin\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
// use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\Feature\Backend\Admin\CreateSuperAdminTest;
use App\User;
use App\Models\{Category, Concentration, Product};

class Test extends CreateSuperAdminTest
{
    use RefreshDatabase;
    
    /**
     * Index test.
     *
     * @return void
     */
    public function testIndex(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->user);
        $response = $this->get(route('backend.admins.products.index'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.product.index');
        $response->assertSeeText('produkty');
    }

    /**
     * Show create product form test.
     *
     * @return void
     */
    public function testCreate(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->user);
        $response = $this->get(route('backend.admins.products.create'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.product.create');
        $response->assertSeeText('dodawanie produktu');
    }

    /**
     * Store product test.
     *
     * @return void
     */
    public function testStore(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->user);
        $category = factory(Category::class)->create();
        $concentration = factory(Concentration::class)->create(
            ['category_id' => $category->id]
        );
        $product = factory(Product::class)->make(
            ['category_id' => $category, 'concentration_id' => $concentration->id]
        );
        
        $response = $this->post(
            route('backend.admins.products.store'),
            $product->toArray()
        );
        $response->assertStatus(302);
        $response->assertRedirect(
            route('backend.admins.products.index')
        );
        $response->assertSessionHas(
            'message', config('settings.ui.backend.messages.added')
        );
    }

    /**
     * Show test.
     *
     * @return void
     */
    public function testShow(): void
    {
        $this->withoutExceptionHandling();

        $category = factory(Category::class)->create();
        $concentration = factory(Concentration::class)->create(
            ['category_id' => $category->id]
        );
        $product = factory(Product::class)->create(
            ['category_id' => $category, 'concentration_id' => $concentration->id]
        );
        $response = $this->actingAs($this->user);
        $response = $this->get(
            route('backend.admins.products.show', [$product->id])
        );

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.product.show');
        $response->assertSeeText('produkt');
    }

    /**
     * Show edit form test.
     *
     * @return void
     */
    public function testEdit(): void
    {
        $this->withoutExceptionHandling();

        $category = factory(Category::class)->create();
        $concentration = factory(Concentration::class)->create(
            ['category_id' => $category->id]
        );
        $product = factory(Product::class)->create(
            ['category_id' => $category, 'concentration_id' => $concentration->id]
        );

        $response = $this->actingAs($this->user);
        $response = $this->get(
            route('backend.admins.products.edit', [$product->id])
        );

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.product.edit');
        $response->assertSeeText('edycja produktu');
    }

    /**
     * Update test.
     *
     * @return void
     */
    public function testUpdate(): void
    {
        $this->withoutExceptionHandling();

        $category = factory(Category::class)->create();
        $concentration = factory(Concentration::class)->create(
            ['category_id' => $category->id]
        );
        $product = factory(Product::class)->create(
            ['category_id' => $category, 'concentration_id' => $concentration->id]
        );
        $product1 = factory(Product::class)->make(
            ['category_id' => $category, 'concentration_id' => $concentration->id]
        );
        $response = $this->actingAs($this->user);
        $response = $this->put(
            route('backend.admins.products.update', [$product->id]),
            $product1->toArray()
        );
        
        $this->assertDatabaseHas(
            'products', [
                'name' => $product1->name,
                'description' => $product1->description,
                'site_description' => $product1->site_description,
                'site_keyword' => $product1->site_keyword,
            ]
        );
        $response->assertStatus(302);
        $response->assertRedirect(
            route('backend.admins.products.show', [$product->id])
        );
        $response->assertSessionHas(
            'message', config('settings.ui.backend.messages.changed')
        );
    }

    /**
     * Update but without changes test.
     *
     * @return void
     */
    public function testUpdateWithoutChanges(): void
    {
        $this->withoutExceptionHandling();

        $category = factory(Category::class)->create();
        $concentration = factory(Concentration::class)->create(
            ['category_id' => $category->id]
        );
        $product = factory(Product::class)->create(
            ['category_id' => $category, 'concentration_id' => $concentration->id]
        );
        $response = $this->actingAs($this->user);
        $response = $this->put(
            route('backend.admins.products.update', [$product->id]),
            $product->toArray()
        );
        
        $response->assertStatus(302);
        $response->assertRedirect(
            route('backend.admins.products.show', [$product->id])
        );
        $response->assertSessionHas(
            'message', config('settings.ui.backend.messages.not_changed')
        );
    }

    public function __testImgUpload()
    {
        $this->withoutExceptionHandling();

        $superAdminRoleID = 1;
        $superAdmin = factory(User::class)->make(['role_id' => $superAdminRoleID]);
        $response = $this->actingAs($superAdmin);
        $product = factory(Product::class)->create();
        $product1 = factory(Product::class)->make();
        
        Storage::fake('public');
        $file = UploadedFile::fake()->image('avatar.jpg');
        $product1['img'] = $file;
        
        $response = $this->put(
            route('backend.admins.products.update', [$product->id]),
            $product1->toArray()
        );
        // dd(config('settings.storage.products_images_path') . '/' . $file->hashName());
        Storage::disk('public')
            ->assertExists(
                config('settings.storage.products_images_path') . 
                    '/' . $file->hashName()
            );
    }

    /**
     * Destroy test.
     *
     * @return void
     */
    public function testDestroy(): void
    {
        $this->withoutExceptionHandling();

        $category = factory(Category::class)->create();
        $concentration = factory(Concentration::class)->create(
            ['category_id' => $category->id]
        );
        $product = factory(Product::class)->create(
            ['category_id' => $category, 'concentration_id' => $concentration->id]
        );

        $response = $this->actingAs($this->user);        
        $response = $this->get(
            route('backend.admins.products.edit', [$product->id])
        );

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.product.edit');        
        $response->assertSeeText('edycja produktu');
       
        $response = $this->delete(
            route('backend.admins.products.destroy', [$product->id])
        );
        
        $response->assertStatus(200);
        // $response->assertSeeText('czy na pewno chcesz usunąć produkt');

        // not delete
        $response = $this->get(
            route(
                'backend.admins.products.show',
                [$product->id]
            )        
        );
        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.product.show');

        // delete
        $deleteYes = ['delete' => 'Yes'];
        $response = $this->delete(
            route(
                'backend.admins.products.destroy',
                [$product->id]
            ),
            $deleteYes
        );
        $response->assertStatus(302);
        $response->assertSessionHas('message', 'usunięto');
    }
}
