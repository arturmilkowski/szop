<?php

declare(strict_types=1);

namespace Tests\Feature\Backend\Admin\Cache;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Models\Role;

class Test extends TestCase
{
    use RefreshDatabase;

    /**
     * Super Admin can clear cache.
     *
     * @return void
     */
    public function testSuperAdminCanClearCache(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->state('superadmin')->create();
        $user = factory(User::class)->make(['role_id' => $role]);
        $response = $this->actingAs($user);
        $response = $this->get(route('backend.admins.cache.index'));

        $response->assertStatus(302);
        $response->assertRedirect(route('backend.admins.index'));
    }

    /**
     * Admin can clear cache.
     *
     * @return void
     */
    public function testAdminCanClearCache(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->state('admin')->create();
        $user = factory(User::class)->make(['role_id' => $role]);
        $response = $this->actingAs($user);
        $response = $this->get(route('backend.admins.cache.index'));

        $response->assertStatus(302);
        $response->assertRedirect(route('backend.admins.index'));
    }

    /**
     * User can not clear cache.
     *
     * @return void
     */
    public function testUserCannotClearCache(): void
    {
        // $this->withoutExceptionHandling();

        $role = factory(Role::class)->create();
        $user = factory(User::class)->make(['role_id' => $role]);
        $response = $this->actingAs($user);
        $response = $this->get(route('backend.admins.cache.index'));

        $response->assertStatus(403);
    }
}
