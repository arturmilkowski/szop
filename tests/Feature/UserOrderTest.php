<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Order\{SaleDocument, Status, Order, Item};

class UserOrderTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    public function testUserOrderIndex(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.users.orders.index'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.user.order.index');
        $response->assertSeeText('Zamówienia');
    }

    /*
    public function testUserOrderShow(): void
    {
        $status = Status::factory()->create();
        $saleDocument = SaleDocument::factory()->create();
        $order = Order::factory()
            ->for($status)
            ->for($saleDocument)
            ->for($this->user::factory(), 'orderable')
            ->create();
        $response = $this->get(route('backend.users.orders.show', $order));
        
        $response->assertStatus(200);
        $response->assertViewIs('backend.user.order.show');
        $response->assertSeeText('Zamówienie');
    }
    */
}
