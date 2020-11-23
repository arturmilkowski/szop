<?php

declare(strict_types = 1);

namespace Tests\Feature\Backend\Admin\Customer;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
use App\Models\Role;

class Test extends TestCase
{
    use RefreshDatabase;

    /**
     * Super Admin can show customer index page.
     *
     * @return void
     */
    public function testSuperAdminCanShowIndexPage(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->states('superadmin')->create();
        $superAdmin = factory(User::class)->make(['role_id' => $role->id]);
        $response = $this->actingAs($superAdmin);
        $response = $this->get(route('backend.admins.customers.index'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.customer.index');
    }

    /**
     * Admin can show customer index page.
     *
     * @return void
     */
    public function testAdminCanShowIndexPage(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->states('admin')->create();
        $admin = factory(User::class)->make(['role_id' => $role->id]);
        $response = $this->actingAs($admin);
        $response = $this->get(route('backend.admins.customers.index'));

        $response->assertStatus(200);
    }

    /**
     * User can not show customer index page.
     *
     * @return void
     */
    public function testUserCanNotShowIndexPage(): void
    {
        // $this->withoutExceptionHandling();

        $role = factory(Role::class)->create();
        $user = factory(User::class)->make(['role_id' => $role->id]);
        $response = $this->actingAs($user);
        $response = $this->get(route('backend.admins.customers.index'));

        $response->assertStatus(403);
    }
}
