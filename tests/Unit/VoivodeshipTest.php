<?php

namespace Tests\Unit;

use App\Models\Customer\Customer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use App\Models\Order\Voivodeship;
use App\Models\User;
use App\Models\User\Profile;

class VoivodeshipTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeVoivodship(): void
    {
        $voivodeship = Voivodeship::factory()->make();

        $this->assertInstanceOf(Voivodeship::class, $voivodeship);
    }

    public function testCreateVoivodeship(): void
    {
        $voivodeship = Voivodeship::factory()->create();

        $this->assertDatabaseHas('voivodeships', ['name' => $voivodeship->name]);
    }

    // public function testVoivodeshipHasManyCustomers(): void
    // {
    //     $voivodeship = Voivodeship::factory()->has(Customer::factory())->create();

    //     $this->assertInstanceOf(Collection::class, $voivodeship->customers);
    // }

    // public function testVoivodeshipHasManyProfiles(): void
    // {
    //     $voivodeship = Voivodeship::factory()
    //         ->has(Profile::factory()->for(User::factory()))
    //         ->create();

    //     $this->assertInstanceOf(Collection::class, $voivodeship->profiles);
    // }
}
