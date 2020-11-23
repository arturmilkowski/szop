<?php

declare(strict_types=1);

namespace Tests\Unit\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use App\User;
use App\Models\{Voivodeship, Profile, Role};
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Test extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic user unit test.
     *
     * @return void
     */
    public function testUser(): void
    {
        $user = factory(User::class)->make();
        $this->assertInstanceOf(User::class, $user);

        $users = $user->all();
        $this->assertInstanceOf(Collection::class, $users);
    }

    /**
     * User belongs to role unit test.
     *
     * @return void
     */
    public function __testUserBelongsToRole(): void
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->make();
        $this->assertInstanceOf(User::class, $user);

        $role = $user->role;
        $this->assertInstanceOf(Role::class, $role);
        $this->assertSame('user', $role->name);
        /*
        $this->assertSame('superadmin', $role->name);
        $this->assertSame('super administrator', $role->display_name);
        */
    }

    /**
     * If the user is super admin.
     *
     * @return void
     */
    public function testUserIsSuperAdmin(): void
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)
            ->create(
                [
                    'role_id' => factory(Role::class)->states('superadmin')->create()
                ]
            );
        $this->assertTrue($user->isSuperAdmin());

        $user = factory(User::class)
            ->create(
                [
                    'role_id' => factory(Role::class)->states('admin')->create()
                ]
            );
        $this->assertFalse($user->isSuperAdmin());
    }

    /**
     * If the user is admin.
     *
     * @return void
     */
    public function testUserIsAdmin(): void
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)
            ->create(
                [
                    'role_id' => factory(Role::class)->states('admin')->create()
                ]
            );
        $this->assertTrue($user->isAdmin());

        $user = factory(User::class)
            ->create(
                [
                    'role_id' => factory(Role::class)->states('superadmin')->create()
                ]
            );
        $this->assertFalse($user->isAdmin());
    }

    /**
     * User has one profile unit test.
     *
     * @return void
     */
    public function __testUserHasOneProfile(): void
    {
        $voivodeship = factory(Voivodeship::class)->create();
        $user = factory(User::class)->create();
        factory(Profile::class)
            ->create(['user_id' => $user, 'voivodeship_id' => $voivodeship->id]);

        $this->assertInstanceOf(Profile::class, $user->profile);
    }

    /**
     * User has orders (morph many) unit test.
     *
     * @return void
     */
    public function testUserHasOrders(): void
    {
        $user = factory(User::class)->make();
        $orders = $user->orders();

        $this->assertInstanceOf(MorphMany::class, $orders);
    }

    /**
     * Create user and his profile test.
     *
     * @return void
     */
    public function __testCreate(): void
    {
        $voivodeship = factory(Voivodeship::class)->create();
        $user = factory(User::class)->create();
        $profile = $user
            ->profile()
            ->save(
                factory(Profile::class)->create(
                    ['user_id' => $user, 'voivodeship_id' => $voivodeship->id]
                )
            );

        $this->assertInstanceOf(User::class, $user);
        $this->assertInstanceOf(Profile::class, $profile);
    }
}
