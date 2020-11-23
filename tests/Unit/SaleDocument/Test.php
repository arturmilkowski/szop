<?php

declare(strict_types = 1);

namespace Tests\Unit\SaleDocument;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use App\Models\SaleDocument;

class Test extends TestCase
{
    use RefreshDatabase;

    /**
     * A category unit test.
     *
     * @return void
     */
    public function testSaleDocument(): void
    {
        $saleDocuments = factory(SaleDocument::class)->make();

        $saleDocuments = SaleDocument::all();

        $this->assertInstanceOf(Collection::class, $saleDocuments);
        // $this->assertCount(3, $salesDocuments);
    }

    /**
     * A category has many products unit test.
     *
     * @return void
     */
    public function testSaleDocumentHasManyOrders(): void
    {
        $saleDocument = factory(SaleDocument::class)->make();
        $orders = $saleDocument->orders;

        $this->assertInstanceOf(Collection::class, $orders);
    }
}
