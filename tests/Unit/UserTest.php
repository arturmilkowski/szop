<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\Order\{Order, Status, SaleDocument};
use App\Models\User\Profile;
use App\Models\Order\Voivodeship;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeUser(): void
    {
        $user = User::factory()->make();

        $this->assertInstanceOf(User::class, $user);
    }

    public function testCreateUser(): void
    {
        $user = User::factory()->create();

        $this->assertInstanceOf(User::class, $user);

    }

    public function testUserHasOrders(): void
    {
        $user = User::factory()
            ->has(Order::factory())
            ->make();        
        
        $this->assertInstanceOf(Collection::class, $user->orders);
    }

    public function testUserHasOneProfile(): void
    {
        $user = User::factory()
            ->has(Profile::factory()->for(Voivodeship::factory()))
            ->create();

        $this->assertInstanceOf(Profile::class, $user->profile);
    }
}
