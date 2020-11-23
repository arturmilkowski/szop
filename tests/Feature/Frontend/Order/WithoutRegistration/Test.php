<?php

declare(strict_types = 1);

namespace Tests\Feature\Frontend\Order\WithoutRegistration;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Frontend\CreateType;
use App\Models\Customer;
use App\Models\Delivery\{Delivery, Method, Cost};

class Test extends CreateType
{
    use RefreshDatabase;

    /**
     * Show form. Buy without registration.
     *
     * @return void
     */
    public function testCreate(): void
    {
        $this->withoutExceptionHandling();

        // add product to a basket
        $response = $this->post(route('frontend.basket.store', [$this->typeID]));
        $response = $this->get(route('frontend.orders.without_registration.create'));

        $response->assertOk();
        $response->assertViewIs('frontend.order.without_registration.create');
        $response->assertSeeText('zamówienie bez rejestracji');
    }

    /**
     * Show form. Buy without registration.
     * And without basket.
     *
     * @return void
     */
    public function testCreateWithoutBasket(): void
    {
        $this->withoutExceptionHandling();

        // without basket
        $response = $this->get(route('frontend.orders.without_registration.create'));
        
        $response->assertStatus(302);
        $response->assertRedirect(route('frontend.pages.index'));
    }

    /**
     * Store order.
     *
     * @return void
     */
    public function testStore(): void
    {
        // Test do not pass with the line bellow
        // $this->withoutExceptionHandling();
       
        $delivery = factory(Delivery::class)->create();
        $method = factory(Method::class)->create(['delivery_id'=> $delivery->id]);
        factory(Cost::class)->create(['method_id'=> $method->id]);
        
        // add product to a basket
        $response = $this->post(route('frontend.basket.store', [$this->typeID]));
        $response->assertStatus(302);
        // cache
        $response = $this->get(route('frontend.orders.cash.index'));
        $response->assertOk();
        // create form page
        $response = $this->get(route('frontend.orders.cash.index'));
        $response->assertOk('frontend.orders.without_registration.create');
        
        $customer = factory(Customer::class)->make();
        
        $response = $this->post(
            route(
                'frontend.orders.without_registration.store',
                $customer->getAttributes(),
                ['sale_document_id' => 3]        
            )
        );
        $response->assertStatus(302);
    }
}
