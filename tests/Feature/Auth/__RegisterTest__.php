<?php

declare(strict_types = 1);

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Show register form test.
     *
     * @return void
     */
    public function testShowRegisterForm(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('register'));

        $response->assertStatus(200);
    }

    /**
     * Register test.
     *
     * @return void
     */
    public function testRegister(): void
    {
        $this->withoutExceptionHandling();

        // it create user in db
        $user = factory(User::class)->raw();
        $user['password_confirmation'] = $user['password'];
        
        $response = $this->post(route('register'), $user);

        $response->assertStatus(302);
        $response->assertRedirect(route('home'));
    }
}
