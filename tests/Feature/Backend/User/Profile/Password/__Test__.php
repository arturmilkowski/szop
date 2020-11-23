<?php

declare(strict_types = 1);

namespace Tests\Feature\Backend\User\Profile\Password;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Models\{Voivodeship, Role, Profile};
use Illuminate\Support\Facades\Hash;
// use App\Models\

class Test extends TestCase
{
    use RefreshDatabase;

    /**
     * Edit test.
     *
     * @return void
     */
    public function __testEdit(): void
    {
        $this->withoutExceptionHandling();
        
        $voivodeship = factory(Voivodeship::class)->create();
        $role = factory(Role::class)->create();
        $user = factory(User::class)->create(['role_id' => $role->id]);        
        
        $profile = $user
            ->profile()
            ->save(
                factory(Profile::class)->create(
                    [
                        'user_id' => $user->id,
                        'voivodeship_id' => $voivodeship->id
                    ]
                )
            );
        $response = $this->actingAs($user);
        $response = $this->get(
            route(
                'backend.users.profiles.password.edit',
                [$profile->id]
            )
        );
        $response->assertStatus(200);
        
        $response->assertViewIs('backend.user.profile.password.edit');
        $response->assertSeeText('zmiana hasła');
    }

    /**
     * Update page test.
     *
     * @return void
     */
    public function __testUpdate(): void
    {
        // $this->withoutExceptionHandling();

        $voivodeship = factory(Voivodeship::class)->create();
        $role = factory(Role::class)->create();
        $user = factory(User::class)->create(['role_id' => $role->id, 'password' => '12345678']);
        $profile = factory(Profile::class)->create(
            [
                'user_id' => $user->id,
                'voivodeship_id' => $voivodeship->id
            ]
        );
        
        $response = $this->actingAs($user);
        
        $response = $this->put(
            route(
                'backend.users.profiles.password.update', [$profile->id]
            ),
            [
                'old-password' => Hash::make($user->password),
                'password' => $user->password,  // 
                'password_confirmation' => Hash::make($user->password),  // Hash::make(
            ]
        );

        //$response->dumpSession();
        //$response->dumpHeaders();
        //$response->dump();
        
        $response->assertStatus(302);
        $response->assertSessionHas('message', 'zmieniono');
    }
}
