<?php

declare(strict_types=1);

namespace Tests\Unit\Basket;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\{Type, Product, Item};
use App\Services\Basket;

class Test extends TestCase
{
    use RefreshDatabase;

    /**
     * Add product to basket.
     *
     * @return void
     */
    public function testAdd(): void
    {
        $this->withoutExceptionHandling();

        $basket = new Basket();
        $this->assertInstanceOf(Basket::class, $basket);

        $productType = new Type();
        $this->assertInstanceOf(Type::class, $productType);

        $product1 = factory(Product::class)->make();

        $isInStock = $productType->isInStock();
        if ($isInStock) {
            $added1 = $basket->add($product1);
            $this->assertInstanceOf(Item::class, $added1);
            $this->assertEquals(1, $added1->quantity);
            $this->assertEquals($product1->price, $basket->totalPrice());
            $this->assertSame(1, $basket->productsCount());
            // add the same product
            $added2 = $basket->add($product1);
            $this->assertInstanceOf(Item::class, $added2);
            $this->assertEquals(2, $added2->quantity);
            $this->assertEquals(($product1->price * 2), $basket->totalPrice());
            $this->assertSame(1, $basket->productsCount());

            $product2 = $productType->find(2);
            $added3 = $basket->add($product2);
            $this->assertEquals(1, $added3->quantity);
            $this->assertEquals(
                (($product1->price * 2) + $product2->price),
                $basket->totalPrice()
            );
            $this->assertSame(2, $basket->productsCount());
        } else {
            $this->assertSame(false, $isInStock);
        }
    }

    /**
     * Remove froduct from basket.
     *
     * @return void
     */
    public function __testRemove(): void
    {
        $this->withoutExceptionHandling();

        $basket = new Basket();
        $productType = new Type();

        $product1 = $productType->find(1);
        $product2 = $productType->find(2);

        $added1 = $basket->add($product1);
        $basket->add($product2);

        $removed1 = $basket->remove($product1);
        $removed2 = $basket->remove($product2);

        $this->assertTrue($removed1);
        $this->assertTrue($removed2);

        $this->assertEquals(0, $added1->quantity);
        $this->assertEquals(0.0, $added1->subtotal_price);

        $this->assertSame(0, $basket->productsCount());
        $this->assertCount(0, $basket->getItems());
        $this->assertSame(0, $basket->productsCount());
    }

    /**
     * Clear all products from basket.
     *
     * @return void
     */
    public function __testClear(): void
    {
        $this->withoutExceptionHandling();

        $basket = new Basket();
        $productType = new Type();

        $product1 = $productType->find(1);
        $basket->add($product1);

        $product2 = $productType->find(2);
        $basket->add($product2);

        $clear = $basket->clear();
        $this->assertTrue($clear);
        $this->assertCount(0, $basket->getItems());
        $this->assertSame(0, $basket->productsCount());
    }

    /**
     * If basket is clear when has no products.
     *
     * @return void
     */
    public function testIsClear(): void
    {
        $this->withoutExceptionHandling();

        $basket = new Basket();

        $this->assertTrue($basket->isClear());
    }
}
