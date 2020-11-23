<?php

declare(strict_types=1);

namespace Tests\Unit\Profile;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\{Profile, Voivodeship, DeliveryAddress};
use App\User;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function __testProfile(): void
    {
        $profile = factory(Profile::class)->make();
        $this->assertInstanceOf(Profile::class, $profile);
    }

    /**
     * Find profile unit test.
     *
     * @return void
     */
    public function __testFind(): void
    {
        $voivodeship = factory(Voivodeship::class)->create();
        $user = factory(User::class)->create();
        $profile = factory(Profile::class)->create(
            ['user_id' => $user->id, 'voivodeship_id' => $voivodeship->id]
        );
        $this->assertInstanceOf(Profile::class, $profile);

        $nonExistingID = 10000;
        $nonExistingProfile = Profile::find($nonExistingID);
        $this->assertNull($nonExistingProfile);
    }

    /**
     * Profile belongs to user unit test.
     *
     * @return void
     */
    public function __testProfileBelongsToUser(): void
    {
        $user = factory(User::class)->create();
        $profile = factory(Profile::class)->make(['user_id' => $user->id]);
        $user = $profile->user;

        $this->assertInstanceOf(User::class, $user);
    }

    /**
     * Profile belongs to voivodeship unit test.
     *
     * @return void
     */
    public function __testProfileBelongsToVoivodeship(): void
    {
        $voivodeship = factory(Voivodeship::class)->create();
        $profile = factory(Profile::class)->make(
            ['voivodeship_id' => $voivodeship->id]
        );
        $voivodeship = $profile->voivodeship;

        $this->assertInstanceOf(Voivodeship::class, $voivodeship);
    }

    /**
     * Profile has one delivery address.
     *
     * @return void
     */
    public function __testProfileHasOneDeliveryAddress()
    {
        $voivodeship = factory(Voivodeship::class)->create();
        $user = factory(User::class)->create();
        $profile = factory(Profile::class)->create(
            ['user_id' => $user->id, 'voivodeship_id' => $voivodeship->id]
        );
        factory(DeliveryAddress::class)->create(
            ['profile_id' => $profile->id, 'voivodeship_id' => $voivodeship->id]
        );
        $deliveryAddress = $profile->deliveryAddress;

        $this->assertInstanceOf(DeliveryAddress::class, $deliveryAddress);
    }
}
