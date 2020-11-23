<?php

declare(strict_types=1);

namespace Tests\Unit\Order;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Item;

class ItemTest extends TestCase
{
    use RefreshDatabase;


    /**
     * Order Item.
     *
     * @return void
     */
    public function testOrderItem(): void
    {
        $this->withoutExceptionHandling();

        $item = factory(Item::class)->make();

        $this->assertInstanceOf(Item::class, $item);
    }

    /**
     * Test Create.
     *
     * @return void
     */
    public function testOrderItemCreate(): void
    {
        $this->withoutExceptionHandling();

        $item = factory(Item::class)->create();

        $this->assertDatabaseHas(
            'items',
            [
                'type_size_id' => $item->type_size_id,
            ]
        );
    }

    /**
     * Order Item has size id field.
     *
     * @return void
     */
    public function testOrderItemHasSizeId(): void
    {
        $this->withoutExceptionHandling();

        $item = factory(Item::class)->make();

        $this->assertIsInt($item->type_size_id);
    }
}
