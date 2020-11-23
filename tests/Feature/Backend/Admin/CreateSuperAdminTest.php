<?php

declare(strict_types=1);

namespace Tests\Feature\Backend\Admin;

use Tests\TestCase;
use App\User;
use App\Models\Role;

abstract class CreateSuperAdminTest extends TestCase
{
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $role = factory(Role::class)->state('superadmin')->create();
        $this->user = factory(User::class)->make(['role_id' => $role]);
    }
}
