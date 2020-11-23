<?php

declare(strict_types=1);

namespace Tests\Feature\Backend\User\Profile;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Models\{Role, Profile, Voivodeship};

class Test extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Create profile test.
     *
     * @return void
     */
    public function testCreate(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->create();
        $user = factory(User::class)->create(['role_id' => $role->id]);

        $response = $this->actingAs($user);
        $response = $this->get(route('backend.users.profiles.create'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.user.profile.create');
        $response->assertSeeText('dodawanie danych osobowych');
    }

    /**
     * Store profile test.
     *
     * @return void
     */
    public function testStore(): void
    {
        // $this->withoutExceptionHandling();

        $role = factory(Role::class)->create();
        $user = factory(User::class)->create(['role_id' => $role->id]);
        $profile = factory(Profile::class)->create(['user_id' => $user->id]);

        $response = $this->actingAs($user);
        $response = $this->post(route('backend.users.profiles.store'), [$profile]);

        $this->assertDatabaseHas(
            'profiles',
            [
                'lastname' => $profile->lastname,
            ]
        );
        // $response->dumpHeaders();
        // $response->dumpSession();
        // $response->dump();
        $response->assertStatus(302);
        // $response->assertSessionHas('message', 'dodano');
    }

    /**
     * Show profile test.
     *
     * @return void
     */
    public function testShow(): void
    {
        $this->withoutExceptionHandling();

        $voivodeship = factory(Voivodeship::class)->create();
        $role = factory(Role::class)->create();
        $user = factory(User::class)->create(['role_id' => $role->id]);
        $profile = factory(Profile::class)->create(
            ['user_id' => $user->id, 'voivodeship_id' => $voivodeship->id]
        );

        $response = $this->actingAs($user);
        $response = $this->get(route('backend.users.profiles.show', [$profile->id]));

        $response->assertStatus(200);
        $response->assertViewIs('backend.user.profile.show');
        $response->assertSeeText('dane osobowe');
    }

    /**
     * Edit profile test.
     *
     * @return void
     */
    public function testEdit(): void
    {
        $this->withoutExceptionHandling();

        $voivodeship = factory(Voivodeship::class)->create();
        $role = factory(Role::class)->create();
        $user = factory(User::class)->create(['role_id' => $role->id]);
        $profile = factory(Profile::class)->create(
            ['user_id' => $user->id, 'voivodeship_id' => $voivodeship->id]
        );
        $response = $this->actingAs($user);

        $response = $this->get(
            route('backend.users.profiles.edit', [$profile->id])
        );

        $response->assertStatus(200);
        $response->assertViewIs('backend.user.profile.edit');
        $response->assertSeeText('edycja danych osobowych');
    }

    /**
     * Update profile test.
     *
     * @return void
     */
    public function __testUpdate(): void
    {
        $this->withoutExceptionHandling();

        // $voivodeship = factory(Voivodeship::class)->create();
        $role = factory(Role::class)->create();
        $user = factory(User::class)->create(['role_id' => $role->id]);
        // dd($user);
        // ['voivodeship_id' => $voivodeship->id]
        $profile = factory(Profile::class)->create(['user_id' => $user->id]);
        // dd($profile);
        // dd(Role::all());
        // $user = $profile->user;
        // dd($user->profile);
        $profile1 = factory(Profile::class)
            ->raw(
                [
                    'user_id' => $user->id,
                    'lastname' => $this->faker->lastName,
                    'street' => $this->faker->streetAddress(),
                    'zip_code' => $this->faker->postcode(),
                    'city' => $this->faker->city(),
                    'voivodeship_id' => $this->faker->numberBetween(1, 16),
                    "phone" => $this->faker->randomNumber(9),
                ]
            );
        // dd($profile1);
        // dd($profile->user);
        $response = $this->actingAs($user);

        $response = $this->put(
            route('backend.users.profiles.update', [$profile->id]),
            $profile1,
        );

        // $response->dumpHeaders();
        // $response->dumpSession();
        $response->dump();

        $response->assertStatus(302);
        $response->assertRedirect(
            route('backend.users.profiles.show', [$profile->id])
        );
        $response->assertSessionHas('message', 'zmieniono');
    }

    /**
     * User can delete his personal data.
     *
     * @return void
     */
    public function testDestroy()
    {
        $this->withoutExceptionHandling();

        $voivodeship = factory(Voivodeship::class)->create();
        $role = factory(Role::class)->create();
        $user = factory(User::class)->create(['role_id' => $role->id]);
        $profile = $user
            ->profile()
            ->save(
                factory(Profile::class)
                    ->make(
                        [
                            'user_id' => $user->id,
                            'voivodeship_id' => $voivodeship->id
                        ]
                    )
            );
        $response = $this->actingAs($user);

        $response = $this->get(
            route('backend.users.profiles.edit', [$profile->id])
        );

        $response->assertStatus(200);
        $response->assertViewIs('backend.user.profile.edit');
        $response->assertSeeText('edycja danych osobowych');

        $response = $this->delete(
            route('backend.users.profiles.destroy', [$profile->id])
        );

        $response->assertStatus(200);
        $response->assertSeeText('czy na pewno chcesz usunąć profil?');

        // not delete
        $response = $this->get(
            route(
                'backend.users.profiles.show',
                [$profile->id]
            )
        );
        $response->assertStatus(200);
        $response->assertViewIs('backend.user.profile.show');

        // delete
        $deleteYes = ['delete' => 'Yes'];
        $response = $this->delete(
            route(
                'backend.users.profiles.destroy',
                [$profile->id]
            ),
            $deleteYes
        );
        $response->assertStatus(302);
        $response->assertSessionHas('message', 'usunięto');
    }
}
