<?php

declare(strict_types = 1);

namespace Tests\Unit\Customer;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use App\Models\{Customer, Voivodeship};

class Test extends TestCase
{
    use RefreshDatabase;

    /**
     * A customer unit test.
     *
     * @return void
     */
    public function testCustomer(): void
    {
        $voivodeship = factory(Voivodeship::class)->create();
        $customer = factory(Customer::class)->create(
            ['voivodeship_id' => $voivodeship]
        );
        $customers = Customer::all();

        $this->assertInstanceOf(Customer::class, $customer);
        $this->assertInstanceOf(Collection::class, $customers);
    }

    /**
     * Customer has order test.
     *
     * @return void
     */
    public function testCustomerHasOrder(): void
    {
        $voivodeship = factory(Voivodeship::class)->create();
        $customer = factory(Customer::class)->create(
            ['voivodeship_id' => $voivodeship]
        );
        $order = $customer->order();
        
        $this->assertInstanceOf(MorphOne::class, $order);
    }

    /**
     * Customer belongs to voivodeship unit test.
     *
     * @return void
     */
    public function testCustomerBelongsToVoivodeship(): void
    {
        $this->withoutExceptionHandling();

        $voivodeship = factory(Voivodeship::class)->create();
        $customer = factory(Customer::class)->make(
            ['voivodeship_id' => $voivodeship]
        );
        $voivodeship = $customer->voivodeship;

        $this->assertInstanceOf(Voivodeship::class, $voivodeship);
    }
}
