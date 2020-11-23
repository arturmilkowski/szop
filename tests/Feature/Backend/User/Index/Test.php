<?php

declare(strict_types = 1);

namespace Tests\Feature\Backend\User\Index;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Models\{Role, Profile};

class Test extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Backend index page.
     * A user does not has a profile.
     *
     * @return void
     */
    public function testIndexUserWithoutProfile(): void
    {
        $this->withoutExceptionHandling();
        
        $role = factory(Role::class)->create();
        $user = factory(User::class)->make(['role_id' => $role->id]);
        $response = $this->actingAs($user);
        $response = $this->get(route('backend.users.index'));

        $response->assertStatus(200);
        // $response->assertSeeText('__invoke');
        $response->assertViewIs('backend.user.profile.complete');
        $response->assertSeeText('uzupełnij dane osobowe');
    }

    /**
     * Backend index page.
     * User has profile.
     *
     * @return void
     */
    public function __testIndexUserWithProfile(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->create();
        $user = factory(User::class)->create(['role_id' => $role->id]);
        factory(Profile::class)->create(['user_id' => $user->id]);
        
        $response = $this->actingAs($user);
        $response = $this->get(route('backend.users.index'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.user.index.index');
        $response->assertSeeText('strona główna konta');
    }
}
