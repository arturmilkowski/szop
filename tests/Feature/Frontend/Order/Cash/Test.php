<?php

declare(strict_types = 1);

namespace Tests\Feature\Frontend\Order\Cash;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Frontend\CreateType;
use App\User;
use App\Models\{Role, Profile, Order, Item, Type};
use App\Services\Basket;

class Test extends CreateType
{
    use RefreshDatabase;
    
    /**
     * Cash index page, but without basket.
     *
     * @return void
     */
    public function testIndexWithoutBasket(): void
    {
        $this->withoutExceptionHandling();

        // user without basket
        $response = $this->get(route('frontend.orders.cash.index'));

        $response->assertRedirect(route('frontend.pages.index'));
    }

    /**
     * Cash page. User without profile.
     *
     * @return void
     */
    public function testIndexWithBasketButWithoutProfile(): void
    {
        $this->withoutExceptionHandling();

        // add product to basket
        $response = $this->post(route('frontend.basket.store', $this->typeID));
        $response->assertStatus(302);
        
        // cash page
        $response = $this->get(route('frontend.orders.cash.index'));

        $response->assertOk();
                
        $response->assertSeeInOrder(
            [
                'zaloguj się i kup', 'załóż konto', 'zamów bez rejestracji'
            ]
        );
        
        // create a user without profile
        $user = factory(User::class)->create(['role_id' => null]);
        $user['password_confirmation'] = $user['password'];

        $data = array_merge(
            $user->getAttributes(),
            ['password_confirmation' => $user->getAttributes()['password']]
        );
        
        // login page
        $response = $this->actingAs($user);
        $response = $this->post(route('login'), $data);
        $response->assertStatus(302);
        $response->assertRedirect(route('home'));

        // when redirect, show the string below instead uzupełnij dane osobowe
        // because the response is not a view
        $response->assertSeeText('Redirecting to');
    }

    /**
     * Cash page. User with profile.
     *
     * @return void
     */
    public function __testIndexWithBasketAndProfile(): void
    {
        $this->withoutExceptionHandling();

        // add product to basket
        $response = $this->post(route('frontend.basket.store', $this->typeID));
        $response->assertStatus(302);
        
        // cash
        $response = $this->get(route('frontend.orders.cash.index'));
        $response->assertStatus(200);
        
        $response->assertSeeInOrder(
            [
                'zaloguj się i kup', 'załóż konto', 'zamów bez rejestracji'
            ]
        );
        
        $basket = new Basket();        
        if ($basket->productsCount() == 0) {  // no basket            
            $response->assertStatus(302);
            $response->assertRedirect(route('frontend.pages.index'));
        }
        
        $role = factory(Role::class)->create();            
        // create a user
        $user = factory(User::class)->create(['role_id' => $role->id]);
        // create profile
        factory(Profile::class)->make(['user_id' => $user->id]);
        $user['password_confirmation'] = $user['password'];
        
        $data = array_merge(
            $user->getAttributes(),
            ['password_confirmation' => $user->getAttributes()['password']]
        );
        
        
        // login page
        $response = $this->actingAs($user);
        $response = $this->post(route('login'), $data);
        $response->assertStatus(302);
        $response->assertRedirect(route('home'));
        $response->assertSeeText('Redirecting to');
        
        $order = factory(Order::class)->raw(['orderable_id' => $user->id]);
        dd($order);
        $response = $this->post(
            route('frontend.orders.with_registration.store'),
            $order
        );

        $response->assertStatus(302);
        $response->assertRedirect(route('frontend.orders.thank.with_authorization'));
        
    }

    /**
     * Store order.
     *
     * @return void
     */
    public function __testStore(): void
    {
        $this->withoutExceptionHandling();

        // add product to basket
        $response = $this->post(route('frontend.basket.store', $this->typeID));
        $response->assertStatus(302);
        
        // go to cash page
        $response = $this->get(route('frontend.orders.cash.index'));
        $response->assertStatus(200);
        
        // login
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);
        $response = $this->post(route('login'));

        // go to home page
        $response = $this->get(route('backend.users.index'));
        $response->assertOk();

        // send order
        $order = factory(Order::class)->create(['orderable_id' => $user->id]);
        
        $basket = new Basket();
        $productType = new Type();        
        $product1 = $productType->find(1);
        $basket->add($product1);
        $product2 = $productType->find(2);
        $basket->add($product2);
                
        $savedItems = $order->saveItems($basket->getItems());
        $this->assertIsArray($savedItems);
                
        $response = $this->post(
            route('frontend.orders.with_registration.store'), $order->toArray()
        );

        $response->assertStatus(302);
        $response->assertRedirect(route('frontend.orders.thank.with_authorization'));
    }
}
