<?php

declare(strict_types = 1);

namespace Tests\Feature\Backend\Admin\Order;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Arr;
use App\Models\{Item, Order, Voivodeship, Customer};
use App\User;
use App\Models\Role;

class Test extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Admin order index page test.
     *
     * @return void
     */
    public function testIndex(): void
    {
        $this->withoutExceptionHandling();

        $admin = $this->makeSuperAdmin();
        $response = $this->actingAs($admin);
        $response = $this->get(route('backend.admins.orders.index'));
        
        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.order.index');
        $response->assertSeeText('zamówienia');
    }

    /**
     * An admin can see show page test.
     *
     * @return void
     */
    public function testAdminCanShowIndexPage(): void
    {
        $this->withoutExceptionHandling();

        $admin = $this->makeAdmin();
        $response = $this->actingAs($admin);
        $response = $this->get(route('backend.admins.orders.index'));
        
        $response->assertStatus(200);
    }

    /**
     * A user cannot see show page test.
     *
     * @return void
     */
    public function testUserCanNotShowIndexPage(): void
    {
        // $this->withoutExceptionHandling();

        $user = $this->makeUser();
        $response = $this->actingAs($user);
        $response = $this->get(route('backend.admins.orders.index'));
        
        $response->assertStatus(403);
    }

    /**
     * Show order page test.
     *
     * @return void
     */
    public function __testShow(): void
    {
        $this->withoutExceptionHandling();

        $admin = $this->makeSuperAdmin();
        $response = $this->actingAs($admin);

        $voivodeship = factory(Voivodeship::class)->create();
        $user = factory(User::class)->create();
        $customer = factory(Customer::class)->create(['voivodeship_id' => $voivodeship->id]);
        $orderables = [$user, $customer];
        $orderable = Arr::random($orderables);
        // dd(get_class($orderable));  // ->orderableName()
        $order = factory(Order::class)->create(
            [
                'orderable_id' => $orderable->id,
                'orderable_type' => get_class($orderable),
            ]
        );
        dd($order);
        // dd();
        $response = $this->get(
            route('backend.admins.orders.show', [$order->id])
        );

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.order.show');
        $response->assertSeeText('zamówienie');

        $this->destroyLastOrder();
    }

    /**
     * User can not see show page.
     *
     * @return void
     */
    public function __testUserCanNotSeeShowPage(): void
    {
        // $this->withoutExceptionHandling();

        $user = $this->makeUser();
        $response = $this->actingAs($user);

        $voivodeship = factory(Voivodeship::class)->create();
        $user = factory(User::class)->create();
        $customer = factory(Customer::class)->create(['voivodeship_id' => $voivodeship->id]);
        $orderables = [$user, $customer];
        $orderable = Arr::random($orderables);
        $order = factory(Order::class)->create(
            [ 
                'orderable_id' => $orderable->id,
                'orderable_type' => get_class($orderable), 
            ]
        );

        $response = $this->get(
            route('backend.admins.orders.show', [$order->id])
        );

        $response->assertStatus(403);

        $this->destroyLastOrder();
    }

    /**
     * Edit order page test.
     *
     * @return void
     */
    public function __testEdit(): void
    {
        $this->withoutExceptionHandling();

        $admin = $this->makeSuperAdmin();
        $response = $this->actingAs($admin);

        $order = factory(Order::class)->create();

        $response = $this->get(
            route('backend.admins.orders.edit', [$order->id])
        );

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.order.edit');
        $response->assertSeeText('edycja statusu zamówienia');

        $this->destroyLastOrder();
    }

    public function __testUserCanNotSeeEditPage(): void
    {
        // $this->withoutExceptionHandling();

        $user = $this->makeUser();
        $response = $this->actingAs($user);

        $order = factory(Order::class)->create();

        $response = $this->get(
            route('backend.admins.orders.edit', [$order->id])
        );

        $response->assertStatus(403);

        $this->destroyLastOrder();
    }

    /**
     * Update order status test.
     *
     * @return void
     */
    public function __testUpdate(): void
    {
        $this->withoutExceptionHandling();

        $admin = $this->makeSuperAdmin();
        $response = $this->actingAs($admin);
        
        $order = factory(Order::class)->create();

        $data = ['status_id' => rand(1, 6)];
        $response = $this->put(
            route('backend.admins.orders.update', [$order->id]),
            $data
        );
        $response->assertStatus(302);
        
        $this->destroyLastOrder();
    }

    /**
     * User can not update order.
     *
     * @return void
     */
    public function __testUserCanNotUpdate(): void
    {
        // $this->withoutExceptionHandling();

        $user = $this->makeUser();
        $response = $this->actingAs($user);
        
        $order = factory(Order::class)->create();

        $data = ['status_id' => rand(1, 6)];
        $response = $this->put(
            route('backend.admins.orders.update', [$order->id]),
            $data
        );
        $response->assertStatus(403);
        
        $this->destroyLastOrder();
    }

    /**
     * Make super admin.
     *
     * @return User
     */
    private function makeSuperAdmin(): User
    {
        $role = factory(Role::class)->state('superadmin')->create();
        $admin = factory(User::class)->make(['role_id' => $role]);

        return $admin;
    }

    /**
     * Make admin.
     *
     * @return User
     */
    private function makeAdmin(): User
    {
        $role = factory(Role::class)->state('admin')->create();
        $admin = factory(User::class)->make(['role_id' => $role]);

        return $admin;
    }

    /**
     * Make user.
     *
     * @return User
     */
    private function makeUser(): User
    {
        $role = factory(Role::class)->create();
        $admin = factory(User::class)->make(['role_id' => $role]);

        return $admin;
    }

    /**
     * Destroy las order.
     *
     * @return void
     */
    private function destroyLastOrder(): void
    {
        Order::destroy(Order::max('id'));  // delete order. is without products
    }
}
