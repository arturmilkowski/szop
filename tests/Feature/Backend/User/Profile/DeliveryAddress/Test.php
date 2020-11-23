<?php

declare(strict_types = 1);

namespace Tests\Feature\Backend\User\Profile\DeliveryAddress;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Models\{Voivodeship, Role, Profile};
use App\Models\DeliveryAddress;

class Test extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Create form page test.
     *
     * @return void
     */
    public function testCreate(): void
    {
        $this->withoutExceptionHandling();

        $voivodeship = factory(Voivodeship::class)->create();
        $role = factory(Role::class)->create();
        $user = factory(User::class)->create(['role_id' => $role->id]);
        $profile = $user
            ->profile()
            ->save(
                factory(Profile::class)->create(
                    ['user_id' => $user->id,
                    'voivodeship_id' => $voivodeship->id]
                )
            );
        $response = $this->actingAs($user);
        $response = $this->get(
            route('backend.users.profiles.delivery_addresses.create', $profile->id)
        );
        
        $response->assertStatus(200);
        $response->assertViewIs('backend.user.profile.delivery_address.create');
        $response->assertSeeText('dodawanie adresu dostawy');
    }

    /**
     * Store delivery address test.
     *
     * @return void
     */
    public function testStore(): void
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
        $deliveryAddress = factory(DeliveryAddress::class)->raw(
            ['profile_id' => $profile->id, 'voivodeship_id' => $voivodeship->id]
        );
        $response = $this->actingAs($user);
        $response = $this->post(
            route(
                'backend.users.profiles.delivery_addresses.store',
                [$profile->id]
            ),
            $deliveryAddress
        );

        $response->assertStatus(302);
        $response->assertSessionHas(
            'message',
            config('settings.ui.backend.messages.added')
        );

        /*
        $response->assertRedirect(
            route(
                'backend.users.profiles.delivery_addresses.show',
                $profile->id, $deliveryAddress->id
            )
        );
        */
    }

    /**
     * Show page test.
     *
     * @return void
     */
    public function __testShow(): void
    {
        $this->withoutExceptionHandling();

        $voivodeship = factory(Voivodeship::class)->create();
        $role = factory(Role::class)->create();
        $user = factory(User::class)->create(['role_id' => $role->id]);
        $profile = $user
            ->profile()
            ->save(
                factory(Profile::class)->make(
                    [
                        'user_id' => $user->id,
                        'voivodeship_id' => $voivodeship->id
                    ]
                )
            );
        $deliveryAddress = $profile
            ->deliveryAddress()
            ->save(
                factory(DeliveryAddress::class)->make(
                    [
                        'profile_id' => $profile->id,
                        'voivodeship_id' => $voivodeship->id
                    ]
                )
            );
        $response = $this->actingAs($user);
        $response = $this->get(
            route(
                'backend.users.profiles.delivery_addresses.show',
                [$profile->id, $deliveryAddress->id]
            )
        );

        $response->assertStatus(200);
        $response->assertViewIs('backend.user.profile.delivery_address.show');
        $response->assertSeeText('adres, na który będą dostarczane przesyłki');
    }

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
        
        $deliveryAddress = $profile
            ->deliveryAddress()
            ->save(
                factory(DeliveryAddress::class)
                    ->create(
                        [
                            'profile_id' => $profile->id,
                            'voivodeship_id' => $voivodeship->id
                        ]
                    )
            );
        $response = $this->actingAs($user);
        $response = $this->get(
            route(
                'backend.users.profiles.delivery_addresses.edit',
                [$profile->id, $deliveryAddress->id]
            )
        );

        $response->assertStatus(200);
        
        $response->assertViewIs('backend.user.profile.delivery_address.edit');
        $response->assertSeeText('edycja adresu dostawy');
    }

    /**
     * Update page test.
     *
     * @return void
     */
    public function testUpdate(): void
    {
        // $this->withoutExceptionHandling();

        $voivodeship = factory(Voivodeship::class)->create();
        $role = factory(Role::class)->create();
        $user = factory(User::class)->create(['role_id' => $role->id]);
        $profile = $user
            ->profile()
            ->save(
                factory(Profile::class)->make(
                    [
                        'user_id' => $user->id,
                        'voivodeship_id' => $voivodeship->id
                    ]
                )
            );
        $deliveryAddress = $profile
            ->deliveryAddress()
            ->save(
                factory(DeliveryAddress::class)->make(
                    [
                        'profile_id' => $profile->id,
                        'voivodeship_id' => $voivodeship->id
                    ]
                )
            );
        $response = $this->actingAs($user);
        $deliveryAddress1 = factory(DeliveryAddress::class)->raw();

        $response = $this->put(
            route(
                'backend.users.profiles.delivery_addresses.update',
                [$profile->id, $deliveryAddress->id],
                $deliveryAddress1
            )
        );
        /*
        $response->assertSessionHas(
            'message',
            config('settings.ui.backend.messages.changed')
        );
        */
        $response->assertStatus(302);
    }

    /**
     * Destroy test
     *
     * @return void
     */
    public function __testDestroy(): void
    {
        $this->withoutExceptionHandling();

        $voivodeship = factory(Voivodeship::class)->create();
        $role = factory(Role::class)->create();
        $user = factory(User::class)->create(['role_id' => $role->id]);
        $profile = $user
            ->profile()
            ->save(
                factory(Profile::class)->make(
                    [
                        'user_id' => $user->id,
                        'voivodeship_id' => $voivodeship->id
                    ]
                )
            );
        $deliveryAddress = $profile
            ->deliveryAddress()
            ->save(
                factory(DeliveryAddress::class)->make(
                    [
                        'profile_id' => $profile->id,
                        'voivodeship_id' => $voivodeship->id
                    ]
                )
            );
        $response = $this->actingAs($user);

        $response = $this->delete(
            route(
                'backend.users.profiles.delivery_addresses.destroy',
                [$profile->id, $deliveryAddress->id]
            )
        );
        $response->assertStatus(200);
        $response->assertSeeText('czy na pewno chcesz usunąć adres dostawy?');
        
        // not delete
        $response = $this->get(
            route(
                'backend.users.profiles.delivery_addresses.show',
                [$profile->id, $deliveryAddress->id]
            )        
        );
        $response->assertStatus(200);
        $response->assertViewIs('backend.user.profile.delivery_address.show');

        // delete
        $deleteYes = ['delete' => 'Yes'];
        $response = $this->delete(
            route(
                'backend.users.profiles.delivery_addresses.destroy',
                [$profile->id, $deliveryAddress->id]
            ),
            $deleteYes
        );
        
        $response->assertStatus(302);
        $response->assertRedirect(
            route('backend.users.profiles.show', [$profile->id])
        );
        $response->assertSessionHas(
            'message', config('settings.ui.backend.messages.removed')
        );
    }
}
