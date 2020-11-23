<?php

declare(strict_types = 1);

namespace Tests\Feature\Backend\Admin\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
use App\Models\{Role, Category, Concentration, Product};

class UserActionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A user cannot see index page.
     *
     * @return void
     */
    public function testUserCanNotSeeIndexPage(): void
    {
        // $this->withoutExceptionHandling();

        $role = factory(Role::class)->create();
        $user = factory(User::class)->create(['role_id' => $role->id]);
        $response = $this->actingAs($user);
        $response = $this->get(route('backend.admins.products.index'));
        $response->assertStatus(403);
    }

    /**
     * A user cannot see show page.
     *
     * @return void
     */
    public function testUserCanNotSeeShowPage(): void
    {
        // $this->withoutExceptionHandling();
        
        $category = factory(Category::class)->create();
        $concentration = factory(Concentration::class)->create(
            ['category_id' => $category->id]
        );
        $product = factory(Product::class)->create(
            ['category_id' => $category, 'concentration_id' => $concentration->id]
        );

        $role = factory(Role::class)->create();
        $user = factory(User::class)->create(['role_id' => $role->id]);
        $response = $this->actingAs($user);
        $response = $this->get(route('backend.admins.products.show', [$product->id]));

        $response->assertStatus(403);
    }

    /**
     * An admin can see edit page.
     *
     * @return void
     */
    public function testAdminCanSeeEditPage(): void
    {
        $this->withoutExceptionHandling();

        $category = factory(Category::class)->create();
        $concentration = factory(Concentration::class)->create(
            ['category_id' => $category->id]
        );
        $product = factory(Product::class)->create(
            ['category_id' => $category, 'concentration_id' => $concentration->id]
        );

        $role = factory(Role::class)->state('admin')->create();
        $admin = factory(User::class)->make(['role_id' => $role->id]);
        $response = $this->actingAs($admin);
        $response = $this->get(
            route('backend.admins.products.edit', [$product->id])
        );

        $response->assertStatus(200);
    }

    /**
     * A user cannot see edit page.
     *
     * @return void
     */
    public function testUserCanNotSeeEditPage(): void
    {
        // $this->withoutExceptionHandling();

        $category = factory(Category::class)->create();
        $concentration = factory(Concentration::class)->create(
            ['category_id' => $category->id]
        );
        $product = factory(Product::class)->create(
            ['category_id' => $category, 'concentration_id' => $concentration->id]
        );

        $role = factory(Role::class)->create();
        $user = factory(User::class)->create(['role_id' => $role->id]);
        $response = $this->actingAs($user);
        $response = $this->get(
            route('backend.admins.products.edit', [$product->id])
        );

        $response->assertStatus(403);
    }

    /**
     * Update test.
     *
     * @return void
     */
    public function testUserCanNotUpdate(): void
    {
        // $this->withoutExceptionHandling();

        $category = factory(Category::class)->create();
        $concentration = factory(Concentration::class)->create(
            ['category_id' => $category->id]
        );
        $product = factory(Product::class)->create(
            ['category_id' => $category, 'concentration_id' => $concentration->id]
        );

        $role = factory(Role::class)->create();
        $user = factory(User::class)->create(['role_id' => $role->id]);
        
        $response = $this->actingAs($user);
        $response = $this->put(
            route('backend.admins.products.update', [$product->id]),
            $product->toArray()
        );
        
        $response->assertStatus(403);        
    }

    /**
     * A user cannot destroy product.
     *
     * @return void
     */
    public function testUserCanNotDestroy(): void
    {
        // $this->withoutExceptionHandling();

        $category = factory(Category::class)->create();
        $concentration = factory(Concentration::class)->create(
            ['category_id' => $category->id]
        );
        $product = factory(Product::class)->create(
            ['category_id' => $category, 'concentration_id' => $concentration->id]
        );

        $role = factory(Role::class)->create();
        $user = factory(User::class)->create(['role_id' => $role->id]);
        $response = $this->actingAs($user);
        

        // delete
        $deleteYes = ['delete' => 'Yes'];
        $response = $this->delete(
            route(
                'backend.admins.products.destroy',
                [$product->id]
            ),
            $deleteYes
        );

        $response->assertStatus(403);
    }
}
