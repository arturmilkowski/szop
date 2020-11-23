<?php

declare(strict_types = 1);

namespace Tests\Unit\Role;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Role;
use App\User;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic role unit test.
     *
     * @return void
     */
    public function testRole(): void
    {
        $superadmin = factory(Role::class)->state('superadmin')->create();
        $admin = factory(Role::class)->state('admin')->create();
        $role = factory(Role::class)->create();

        $roles = Role::all();
        $this->assertInstanceOf(Collection::class, $roles);
        $this->assertCount(3, $roles);
    }

    /**
     * A role has many users unit test.
     *
     * @return void
     */
    public function testRoleHasManyUsers(): void
    {
        $role = factory(Role::class)->make();
        $this->assertInstanceOf(Role::class, $role);
        /*
        $users = $role->users;
        $this->assertInstanceOf(Collection::class, $users);
        
        $user = $users[0];
        $this->assertInstanceOf(User::class, $user);
        */
    }
}
