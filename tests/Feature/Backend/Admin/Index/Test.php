<?php

declare(strict_types = 1);

namespace Tests\Feature\Backend\Admin\Index;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Models\Role;

class Test extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Admin index page test.
     *
     * @return void
     */
    public function testIndex(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->state('superadmin')->create();
        $user = factory(User::class)->make(['role_id' => $role]);
        $response = $this->actingAs($user);
        $response = $this->get(route('backend.admins.index'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.index.index');
        $response->assertSeeText('strona główna panelu administracyjnego');
    }

    /**
     * A user cannot see admin index page.
     *
     * @return void
     */
    public function testUserCanNotSeeIndexPage(): void
    {
        // $this->withoutExceptionHandling();

        $role = factory(Role::class)->create();
        $user = factory(User::class)->make(['role_id' => $role]);
        $response = $this->actingAs($user);
        $response = $this->get(route('backend.admins.index'));

        $response->assertStatus(403);
    }
}
