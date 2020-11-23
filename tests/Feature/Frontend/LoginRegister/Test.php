<?php

declare(strict_types = 1);

namespace Tests\Feature\Frontend\LoginRegister;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Test extends TestCase
{
    use RefreshDatabase;

    /**
     * Login or register page test.
     *
     * @return void
     */
    public function testLoginRegisterPage(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('frontend.login_register.index'));
        
        $response->assertStatus(200);
        // $response->assertSee('__invoke');
        $response->assertViewIs('frontend.login_register.index');
        $response->assertSeeText('zaloguj się');
        $response->assertSeeText('zarejestruj się');
        $response->assertViewHas('currentRouteName');
    }
}
