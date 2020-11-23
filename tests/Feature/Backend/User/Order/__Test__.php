<?php

declare(strict_types = 1);

namespace Tests\Feature\Backend\User\Order;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Models\{Profile, Order};

class Test extends TestCase
{
    use RefreshDatabase;
    
    /**
     * User's orders.
     *
     * @return void
     */
    public function __testIndex(): void
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->make();
        factory(Profile::class)->make(['user_id' => $user->id]);

        $response = $this->actingAs($user);
        $response = $this->get(route('backend.users.orders.index'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.user.order.index');
        $response->assertSeeText('zamówienia');
        $response->assertViewHas('currentRouteName');
    }

    /**
     * User's order detail.
     *
     * @return void
     */
    public function __testShow(): void
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $order = factory(Order::class)->create(['orderable_id' => $user->id]);
        $response = $this->actingAs($user);
        $response = $this->get(
            route('backend.users.orders.show', ['order' => $order->id])
        );

        $response->assertStatus(200);
        $response->assertViewIs('backend.user.order.show');
        $response->assertSeeText('zamówienie');
        $response->assertViewHas('currentRouteName');
    }
}
