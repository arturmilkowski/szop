<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use App\Models\Order\SaleDocument;
use App\Models\Order\{Status, Order};
use App\Models\Customer\Customer;

class SaleDocumentTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeSaleDocument(): void
    {
        $saleDocument = SaleDocument::factory()->make();

        $this->assertInstanceOf(SaleDocument::class, $saleDocument);
    }

    public function testCreateSaleDocument(): void
    {
        $saleDocument = SaleDocument::factory()->create();

        $this->assertDatabaseHas('sale_documents', [
            'slug' => $saleDocument->slug,
            'name' => $saleDocument->name,
            'description' => $saleDocument->description,
        ]);
    }

    public function testDocumentHasManyOrders(): void
    {
        $saleDocument = SaleDocument::factory()
            ->has(
                Order::factory()
                    ->for(
                        Status::factory()
                    )
                    ->for(Customer::factory(), 'orderable')
            )
            ->create();

        $this->assertInstanceOf(Collection::class, $saleDocument->orders);
    }
}
