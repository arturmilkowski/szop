<?php

declare(strict_types=1);

namespace Tests\Feature\Backend\Admin\Product\Brand;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Feature\Backend\Admin\CreateSuperAdminTest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Product\Brand;

use App\User;
use App\Models\Role;
use Tests\Feature\TypeTest;

class BrandTest extends TestCase  // CreateSuperAdminTest
{
    use RefreshDatabase;
    use TypeTest;

    /**
     * Index.
     *
     * @return void
     */
    public function testIndex(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->state('superadmin')->create();
        $user = factory(User::class)->make(['role_id' => $role]);
        $response = $this->actingAs($user);
        // dd($user);
        $response = $this->get(
            'http://127.0.0.1:8000/konto/admin/produkty/producenci'
        );
        // route('backend.admins.products.brands.index')
        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.product.brand.index');
        // $response->assertSeeText('firmy');
        // dd($response);
    }

    public function testCreate(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->state('superadmin')->create();
        $user = factory(User::class)->make(['role_id' => $role]);
        $response = $this->actingAs($user);
        // dd($user);
        $response = $this->get(
            'http://127.0.0.1:8000/konto/admin/produkty/producenci/utworz'
        );
        // ->json('POST', '/user', ['name' => 'Sally']);
        // 
        // route('backend.admins.products.brands.index')
        // 'http://127.0.0.1:8000/konto/admin/produkty/producenci/utworz'
        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.product.brand.create');
        // $response->assertSeeText('firmy');
        // dd($response);
    }

    public function __testStore(): void
    {
        // $this->withoutExceptionHandling();

        $role = factory(Role::class)->state('superadmin')->create();
        $user = factory(User::class)->make(['role_id' => $role]);
        $response = $this->actingAs($user);
        $brand = factory(Brand::class)->make();
        // dd($brand->toArray());
        $response = $this->post(
            'http://127.0.0.1:8000/konto/admin/produkty/producenci',
            [$brand->toArray()]
        );
        // dd($response);
        $this->assertDatabaseHas(
            'brands',
            [
                'slug' => $brand->slug,
                'name' => $brand->name,
            ]
        );
        
    }

    public function testShow(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->state('superadmin')->create();
        $user = factory(User::class)->make(['role_id' => $role]);
        $response = $this->actingAs($user);
        $brand = factory(Brand::class)->create();
        $response = $this->get(
            "http://127.0.0.1:8000/konto/admin/produkty/producenci/$brand->id"
        );

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.product.brand.show');
        $response->assertSeeText('producent');
    }

    public function testEdit(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->state('superadmin')->create();
        $user = factory(User::class)->make(['role_id' => $role]);
        $response = $this->actingAs($user);
        $brand = factory(Brand::class)->create();
        $response = $this->get(
            "http://127.0.0.1:8000/konto/admin/produkty/producenci/$brand->id/edytuj"
        );

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.product.brand.edit');
        $response->assertSeeText('edycja producenta');
    }

    public function __testUpdate(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->state('superadmin')->create();
        $user = factory(User::class)->make(['role_id' => $role]);
        $response = $this->actingAs($user);
        $brand = factory(Brand::class)->create();
        $brand1 = factory(Brand::class)->make();
        $response = $this->put(
            route(
                'backend.admins.products.brands.update',
                [$brand->id]
            ),
            $brand1->toArray()
        );
    }
}
