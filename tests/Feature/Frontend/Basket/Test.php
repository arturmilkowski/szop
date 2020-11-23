<?php

declare(strict_types = 1);

namespace Tests\Feature\Frontend\Basket;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Feature\Frontend\CreateType;

class Test extends CreateType
{
    use RefreshDatabase;

    /**
     * Add product to basket test.
     * From main page and from basket.
     *
     * @return void
     */
    public function testStoreProduct(): void
    {
        $this->withoutExceptionHandling();
        
        $response = $this->post(route('frontend.basket.store', $this->typeID));
        
        $response->assertStatus(302);
        $response->assertSessionHas(
            'message', config('settings.ui.backend.messages.added')
        );
    }

    /**
     * Remove product from basket test.
     *
     * @return void
     */
    public function testDestroyProduct(): void
    {
        $this->withoutExceptionHandling();
        
        $response = $this->delete(route('frontend.basket.destroy', $this->typeID));
        
        $response->assertStatus(302);
        $response->assertSessionHas(
            'message', config('settings.ui.backend.messages.removed')
        );
    }

    /**
     * Delete all products from basket test.
     *
     * @return void
     */
    public function __testRemoveBasket(): void
    {
        $response = $this->get(route('frontend.basket.remove'));
        
        $response->assertStatus(302);
        $response->assertSessionHas(
            'message', config('settings.ui.backend.messages.removed_basket')
        );
    }
}
