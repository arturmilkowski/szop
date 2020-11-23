<?php

declare(strict_types = 1);

namespace Tests\Feature\Backend\User\Order\Printing;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
use App\Models\{Role, Profile, Order, Item};

class Test extends TestCase
{
    use RefreshDatabase;

    /**
     * Print bill from browser.
     *
     * @return void
     */
    public function __testHtmlBill(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->create();
        $user = factory(User::class)->create(['role_id' => $role->id]);
        $profile = factory(Profile::class)->make(['user_id' => $user->id]);
        //dd($p);
        $order = factory(Order::class)->create(
            [
                'orderable_id' => $user->id,
                'orderable_type' => 'App\User'
            ]
        );
        // dd($order);
        factory(Item::class)->create(['order_id' => $order->id]);
        $response = $this->actingAs($user);
        $response = $this->get(
            route(
                'backend.users.orders.prints.html',
                ['order' => $order->id, 'dokument' => 'rachunek']
            )
        );

        $response->assertStatus(200);
        $response->assertViewIs('backend.user.order.print.html');
        $response->assertSeeText('rachunek');
    }

    /**
     * Print invoice from browser.
     *
     * @return void
     */
    public function __testHtmlInvoice(): void
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        factory(Profile::class)->create(['user_id' => $user->id]);
        $order = factory(Order::class)->create(
            [
                'orderable_id' => $user->id,
                'orderable_type' => 'App\User'
            ]
        );
        factory(Item::class)->create(['order_id' => $order->id]);
        $response = $this->actingAs($user);
        $response = $this->get(
            route(
                'backend.users.orders.prints.html',
                ['order' => $order->id, 'dokument' => 'faktura']
            )
        );

        $response->assertStatus(200);
        $response->assertViewIs('backend.user.order.print.html');
        $response->assertSeeText('faktura');
    }

    public function __testPDFBill(): void
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        factory(Profile::class)->create(['user_id' => $user->id]);
        $order = factory(Order::class)->create(
            [
                'orderable_id' => $user->id,
                'orderable_type' => 'App\User'
            ]
        );
        factory(Item::class)->create(['order_id' => $order->id]);
        $response = $this->actingAs($user);
        $response = $this->get(
            route(
                'backend.users.orders.prints.html',
                ['order' => $order->id, 'dokument' => 'rachunek']
            )
        );

        $response->assertStatus(200);
        $response->assertViewIs('backend.user.order.print.html');
        $response->assertSeeText('rachunek');
    }
}
