<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Customer\Customer;
use App\Models\Order\{Order, Status, SaleDocument, Voivodeship};

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeCustomer(): void
    {
        $customer = Customer::factory()->make();

        $this->assertInstanceOf(Customer::class, $customer);
    }

    public function testCreateCustomer(): void
    {
        $this->withoutExceptionHandling();
        $voivodeship = Voivodeship::factory()->create();
        $customer = Customer::factory()->for($voivodeship)->create();

        $this->assertDatabaseHas('customers', [
            'voivodeship_id' => $voivodeship->id,
            'name' => $customer->name,
            'surname' => $customer->surname,
            'street' => $customer->street,
            'zip_code' => $customer->zip_code,
            'city' => $customer->city,
            'email' => $customer->email,
            'phone' => $customer->phone,
        ]);
    }

    public function testCustomerBelongsToVoivodeship(): void
    {
        $this->withoutExceptionHandling();
        $voivodeship = Voivodeship::factory()->create();
        $customer = Customer::factory()->for($voivodeship)->create();

        $this->assertInstanceOf(Voivodeship::class, $customer->voivodeship);
    }

    public function testCustomerHasOrder(): void
    {
        $this->withoutExceptionHandling();
        $voivodeship = Voivodeship::factory()->create();
        $status = Status::factory()->create();
        $saleDocument = SaleDocument::factory()->create();
        $order = Order::factory()
            ->for($status)
            ->for($saleDocument);
        $customer = Customer::factory()
            ->for($voivodeship)
            ->has($order)
            ->create();

        $this->assertInstanceOf(Order::class, $customer->order);
    }
}
