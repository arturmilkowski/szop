<?php

declare(strict_types=1);

namespace Tests\Feature\Backend\Admin\Product\Test;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Tests\TestCase;
use Tests\Feature\Backend\Admin\CreateSuperAdminTest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\{Product, Type};
use App\Models\Product\Size;
use App\User;
use Tests\Feature\TypeTest;

class Test extends CreateSuperAdminTest
{
    use RefreshDatabase;
    use TypeTest;

    /**
     * Create type form.
     *
     * @return void
     */
    public function testCreate(): void
    {
        $this->withoutExceptionHandling();

        $this->typeTest();

        $response = $this->actingAs($this->user);

        $response = $this->get(
            route(
                'backend.admins.products.types.create',
                [$this->product->id, $this->type->id]
            )
        );

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.product.type.create');
        $response->assertSeeText('dodawanie typu produktu');
    }

    /**
     * Store product type test.
     *
     * @return void
     */
    public function testStore(): void
    {
        $this->withoutExceptionHandling();

        $this->typeTest();
        // override type from typeTest trait
        $size = factory(Size::class)->create();
        $type = factory(Type::class)->make(
            [
                'product_id' => $this->product->id,
                'size_id' => $size->id,
            ]
        );
        $response = $this->actingAs($this->user);
        $response = $this->post(
            route(
                'backend.admins.products.types.store',
                [$this->product->id]
            ),
            $type->toArray()
        );

        $this->assertDatabaseHas(
            'types',
            [
                'slug' => $this->type->slug,
                'name' => $this->type->name,
                'price' => $this->type->price,
                'description' => $this->type->description,
            ]
        );
        $response->assertStatus(302);
        $response->assertRedirect(
            route('backend.admins.products.show', [$this->product->id])
        );
        $response->assertSessionHas(
            'message',
            config('settings.ui.backend.messages.added')
        );

        // $this->destroyLast();
    }

    /**
     * Show product type test.
     *
     * @return void
     */
    public function testShow(): void
    {
        $this->withoutExceptionHandling();

        $this->typeTest();

        $response = $this->actingAs($this->user);
        $response = $this->get(
            route(
                'backend.admins.products.types.show',
                [$this->product->id, $this->type->id]
            )
        );

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.product.type.show');
        $response->assertSeeText('typ (rodzaj) produktu');
    }

    /**
     * Edit product type form test.
     *
     * @return void
     */
    public function testEdit(): void
    {
        $this->withoutExceptionHandling();

        $this->typeTest();

        // $product = factory(Product::class)->create();
        // $type = factory(Type::class)->create(['product_id' => $product]);

        $response = $this->actingAs($this->user);
        $response = $this->get(
            route(
                'backend.admins.products.types.edit',
                [$this->product->id, $this->type->id]
            )
        );

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.product.type.edit');
        $response->assertSeeText('edycja typu (rodzaju) produktu');
    }

    /**
     * Update product type test.
     *
     * @return void
     */
    public function testUpdate(): void
    {
        $this->withoutExceptionHandling();

        $this->typeTest();

        $type1 = factory(Type::class)->make();

        $response = $this->actingAs($this->user);
        $response = $this->put(
            route(
                'backend.admins.products.types.update',
                [$this->product->id, $this->type->id]
            ),
            $type1->toArray()
        );

        $this->assertDatabaseHas(
            'types',
            [
                'slug' => $type1->slug,
                'name' => $type1->name,
                'price' => $type1->price,
                'description' => $type1->description,
            ]
        );
        $response->assertStatus(302);
        $response->assertRedirect(
            route(
                'backend.admins.products.types.show',
                [$this->product->id, $this->type->id]
            )
        );
        $response->assertSessionHas(
            'message',
            config('settings.ui.backend.messages.changed')
        );
    }

    public function __testImgUpload()
    {
        $this->withoutExceptionHandling();

        $superAdminRoleID = 1;
        $superAdmin = factory(User::class)->make(['role_id' => $superAdminRoleID]);
        $response = $this->actingAs($superAdmin);

        $product = factory(Product::class)->create();
        $type = factory(Type::class)->create(['product_id' => $product]);


        Storage::fake('public');
        $file = UploadedFile::fake()->image('avatar.jpg');
        $type1 = factory(Type::class)->make(
            ['product_id' => $product, 'img' => $file]
        );

        $response = $this->put(
            route('backend.admins.products.types.update', [$product->id, $type->id]),
            $type1->toArray()
        );

        // config('settings.storage.storage.types_images_path')        
        $imgName = $product->slug . '-' . $type1->slug . '.' .
            $file->guessClientExtension();
        // Storage::disk('public')->assertExists(config('settings.storage.storage.types_images_path') . '/' . $imgName);

        // $this->destroyLast();
    }

    // TODO test destroy img

    /**
     * Destroy product type test.
     *
     * @return void
     */
    public function testDestroy(): void
    {
        $this->withoutExceptionHandling();

        $this->typeTest();

        $response = $this->actingAs($this->user);

        $response = $this->get(
            route(
                'backend.admins.products.types.edit',
                [$this->product->id, $this->type->id]
            )
        );

        $response->assertStatus(200);

        // not delete
        $response = $this->get(
            route(
                'backend.admins.products.types.show',
                [$this->product->id, $this->type->id]
            )
        );
        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.product.type.show');

        // delete
        $deleteYes = ['delete' => 'Yes'];
        $response = $this->delete(
            route(
                'backend.admins.products.types.destroy',
                [$this->product->id, $this->type->id]
            ),
            $deleteYes
        );
        $response->assertStatus(302);
        $response->assertSessionHas('message', 'usunięto');
    }
}
