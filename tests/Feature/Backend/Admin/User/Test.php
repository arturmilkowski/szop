<?php

declare(strict_types=1);

namespace Tests\Feature\Backend\Admin\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
use App\Models\Role;

class Test extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->state('superadmin')->create();
        $superAdmin = factory(User::class)->make(['role_id' => $role->id]);
        $response = $this->actingAs($superAdmin);
        $response = $this->get(route('backend.admins.users.index'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.user.index');
        $response->assertSeeText('użytkownicy');
    }

    /**
     * Admin can see user index page.
     *
     * @return void
     */
    public function testAdminCanSeeIndexPage(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->state('admin')->create();
        $admin = factory(User::class)->make(['role_id' => $role->id]);
        $response = $this->actingAs($admin);
        $response = $this->get(route('backend.admins.users.index'));

        $response->assertStatus(200);
    }

    /**
     * User can not see user index page.
     *
     * @return void
     */
    public function testUserCanNotSeeIndexPage(): void
    {
        //$this->withoutExceptionHandling();

        $role = factory(Role::class)->create();
        $user = factory(User::class)->make(['role_id' => $role->id]);
        $response = $this->actingAs($user);
        $response = $this->get(route('backend.admins.users.index'));

        $response->assertStatus(403);
    }

    /**
     * Create user form test.
     *
     * @return void
     */
    public function testCreate(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->state('superadmin')->create();
        $superAdmin = factory(User::class)->make(['role_id' => $role->id]);
        $response = $this->actingAs($superAdmin);
        $response = $this->get(route('backend.admins.users.create'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.user.create');
        $response->assertSeeText('użytkownicy');
    }

    /**
     * User can not see user create page.
     *
     * @return void
     */
    public function testUserCanNotSeeCreatePage(): void
    {
        // $this->withoutExceptionHandling();

        $role = factory(Role::class)->create();
        $user = factory(User::class)->make(['role_id' => $role->id]);
        $response = $this->actingAs($user);
        $response = $this->get(route('backend.admins.users.create'));

        $response->assertStatus(403);
    }
    /**
     * Admin store user to database test.
     *
     * @return void
     */
    public function __testStore(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->state('superadmin')->create();
        $admin = factory(User::class)->make(['role_id' => $role->id]);
        $response = $this->actingAs($admin);
        $user = factory(User::class)->make();
        $data = array_merge(
            $user->getAttributes(),
            ['password_confirmation' => $user->getAttributes()['password']]
        );
        $response = $this->post(route('backend.admins.users.store'), $data);

        $response->assertStatus(302);
        $response->assertRedirect(route('backend.admins.users.index'));
        $response->assertSessionHas(
            'message',
            config('settings.ui.backend.messages.added')
        );
        $this->assertDatabaseHas('users', ['email' => $user->email]);
    }

    /**
     * User can not store new user.
     *
     * @return void
     */
    public function testUserCanNotStore(): void
    {
        // $this->withoutExceptionHandling();

        $role = factory(Role::class)->create();
        $user = factory(User::class)->make(['role_id' => $role->id]);
        $response = $this->actingAs($user);
        $data = array_merge(
            $user->getAttributes(),
            ['password_confirmation' => $user->getAttributes()['password']]
        );
        $response = $this->post(route('backend.admins.users.store'), $data);

        $response->assertStatus(403);
    }

    /**
     * Show user detail test.
     *
     * @return void
     */
    public function __testShow(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->state('superadmin')->create();
        $admin = factory(User::class)->make(['role_id' => $role->id]);
        $response = $this->actingAs($admin);
        $user = factory(User::class)->create();
        $response = $this->get(route('backend.admins.users.show', [$user->id]));

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.user.show');
        $response->assertSeeText('użytkownik');
    }

    /**
     * A user cannot see show page.
     *
     * @return void
     */
    public function __testUserCanNotSeeShowPage(): void
    {
        // $this->withoutExceptionHandling();

        // $role = factory(Role::class)->create();
        $user = factory(User::class)->create();  // ['role_id' => $role->id]
        // dd($user);
        $response = $this->actingAs($user);
        $response = $this->get(route('backend.admins.users.show', [$user->id]));

        $response->assertStatus(403);
    }

    /**
     * Show user edit form test.
     *
     * @return void
     */
    public function __testEdit(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->state('superadmin')->create();
        $admin = factory(User::class)->make(['role_id' => $role->id]);
        $response = $this->actingAs($admin);
        $user = factory(User::class)->create();
        $response = $this->get(route('backend.admins.users.edit', [$user->id]));

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.user.edit');
        $response->assertSeeText('edycja');
    }

    /**
     * User can not see user edit page.
     *
     * @return void
     */
    public function __testUserCanNotSeeEditPage(): void
    {
        // $this->withoutExceptionHandling();

        // $role = factory(Role::class)->create();
        $user = factory(User::class)->create();  // ['role_id' => $role->id]
        $response = $this->actingAs($user);
        $response = $this->get(route('backend.admins.users.edit', [$user->id]));

        $response->assertStatus(403);
    }

    /**
     * Update user test.
     *
     * @return void
     */
    public function __testUpdate(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->state('superadmin')->create();
        $admin = factory(User::class)->make(['role_id' => $role->id]);
        $response = $this->actingAs($admin);
        $user = factory(User::class)->create();  // ['role_id' => $role->id]
        $user1 = factory(User::class)->make(['role_id' => $role->id]);
        $response = $this->put(
            route('backend.admins.users.update', [$user->id]),
            $user1->toArray()
        );

        $response->assertStatus(302);
        $response->assertRedirect(route('backend.admins.users.show', [$user->id]));
        $response->assertSessionHas(
            'message',
            config('settings.ui.backend.messages.changed')
        );
    }

    /**
     * A user cannot update another user.
     *
     * @return void
     */
    public function __testUserCanNotUpdate(): void
    {
        // $this->withoutExceptionHandling();

        // $role = factory(Role::class)->create();
        // dd($role);
        // $user = factory(User::class)->make(['role_id' => $role->id]);
        // $response = $this->actingAs($user);

        $user = factory(User::class)->create();
        $response = $this->actingAs($user);
        $user1 = factory(User::class)->make();
        $response = $this->put(
            route('backend.admins.users.update', [$user->id]),
            $user1->toArray()
        );

        $response->assertStatus(403);
    }

    /**
     * Update user, no update.
     *
     * @return void
     */
    public function __testUpdateWithoutChanges(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->state('superadmin')->create();
        $admin = factory(User::class)->make(['role_id' => $role->id]);
        $response = $this->actingAs($admin);
        $user = factory(User::class)->create();
        $response = $this->put(
            route('backend.admins.users.update', [$user->id]),
            $user->toArray()
        );

        $response->assertStatus(302);
        $response->assertRedirect(route('backend.admins.users.show', [$user->id]));
        $response->assertSessionHas(
            'message',
            config('settings.ui.backend.messages.not_changed')
        );
    }

    /**
     * Destroy user test.
     *
     * @return void
     */
    public function __testDestroy(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->state('superadmin')->create();
        $admin = factory(User::class)->make(['role_id' => $role->id]);
        $response = $this->actingAs($admin);
        $user = factory(User::class)->create();
        $response = $this->delete(
            route('backend.admins.users.destroy', [$user->id])
        );
        $response->assertStatus(200);
        $response->assertSeeText('usuwanie użytkownika');

        // do not delete
        $response = $this->get(route('backend.admins.users.show', [$user->id]));
        $response->assertStatus(200);
        $response->assertSeeText('użytkownik');

        // delete
        $response = $this->delete(
            route('backend.admins.users.destroy', [$user->id]),
            ['delete' => 'Yes']
        );

        $response->assertStatus(302);
        $response->assertRedirect(
            route('backend.admins.users.index')
        );
        $response->assertSessionHas('message', 'usunięto');
    }
}
