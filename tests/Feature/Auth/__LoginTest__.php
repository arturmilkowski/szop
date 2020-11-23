<?php

declare(strict_types = 1);

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Show login form test.
     *
     * @return void
     */
    public function testShowLoginForm(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('login'));

        $response->assertStatus(200);
    }

    /**
     * Login user.
     *
     * @return void
     */
    public function testLogin(): void
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->make();        
        $response = $this->actingAs($user);
        $response = $this->post(route('login'));

        $response->assertStatus(302);
        $response->assertRedirect(route('home'));
    }

    /**
     * Login user.
     *
     * @return void
     */
    public function testLogout(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->post(route('logout'));

        $response->assertStatus(302);
        $response->assertRedirect('/');
        // $response->assertRedirect(route('frontend.pages.index'));
    }
}
