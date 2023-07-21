<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Product\Type;
use App\Models\Order\Item;

class Cart
{
    public function add(Type $type)
    {
        if (session()->has("cart.items.{$type->id}")) {
            $productInCart = session()->pull("cart.items.{$type->id}");
            $success = $this->addProductToCart($type, $productInCart->quantity += 1);
            $this->setTotalPrice();

            return $success;
        } else {
            $success = $this->addProductToCart($type, $quantity = 1);
            $this->setTotalPrice();

            return $success;
        }
    }

    public function remove(Type $type)
    {
        if (session()->has("cart.items.{$type->id}")) {
            $productInCart = session()->pull("cart.items.{$type->id}");
            $quantity = $productInCart['quantity'] -= 1;

            if ($productInCart['quantity'] > 0) {
                $this->addProductToCart($type, $quantity);
                $this->setTotalPrice();
            }

            return true;
        }

        return false;
    }

    public function removeAll(): bool
    {
        session()->flush();

        return true;
    }

    public function getItems(): array
    {
        return session()->get('cart.items');
    }

    public function uniqueItemsCount(): int
    {
        if (session()->get('cart.items') == null) {
            return 0;
        }

        return count(session()->get('cart.items'));
    }

    public function itemsCount(): int
    {
        if (session()->get('cart.items') == null) {
            return 0;
        }

        $count = array_reduce(session('cart.items'), [$this, 'count']);

        return $count;
    }

    public function isEmpty(): bool
    {
        if (session()->get('cart.items') == null) {
            return true;
        }

        if (count(session()->get('cart.items')) > 0) {
            return false;
        }

        return true;
    }

    /**
     * Cart total price.
     *
     * @return float
     */
    public function totalPrice(): float
    {
        if (session('cart.totalPrice') == null) {
            return 0;
        }

        return session('cart.totalPrice');
    }

    /**
     * Sum of total price and delivery cost.
     *
     * @param float $deliveryCost Delivery cost
     * @return float
     */
    public function totalPriceAndDeliveryCost(float $deliveryCost): float
    {
        return $this->totalPrice() + $deliveryCost;
    }

    /**
     * Clear all cart's products.
     *
     * @return boolean
     */
    public function clear(): bool
    {
        session()->forget('cart');

        return true;
    }

    // private functions -------------------------------------------------

    /**
     * Amount of products
     *
     * @param integer|null $carry Carry
     * @param object       $item  Basket item
     * 
     * @return integer
     */
    private function count(?int $carry, object $item): int
    {
        $carry += $item->quantity;

        return $carry;
    }

    private function addProductToCart(Type $type, int $quantity): Item
    {
        $item = $this->createOrderItem($type, $quantity);
        $item->subtotal_price = $item->quantity * $item->price;
        session()->put("cart.items.{$type->id}", $item);

        return $item;
    }

    /**
     * Create special product for cart
     *
     * @param Type $type Type of product
     * @return Item
     */
    private function createOrderItem(Type $type, int $quantity): Item
    {
        $item = new Item();
        $item->type_id = $type->id;
        $item->type_name = $type->name;
        $item->type_size_id = $type->size_id;
        $item->name = $type->product->name;
        $item->concentration = $type->product->concentration->name;
        $item->category = $type->product->category->name;
        $item->price = $type->price;
        $item->quantity = $quantity;
        // $item->subtotal_price = $type->price;

        return $item;
    }

    /**
     * Set cart total price.
     *
     * @return void
     */
    private function setTotalPrice(): void
    {
        $totalPrice = array_reduce(session('cart.items'), [$this, 'sum']);

        session(['cart.totalPrice' => $totalPrice]);
    }

    /**
     * Sums the price for the product.
     *
     * @param float|null $carry Price
     * @param object     $item  OrderItem
     * 
     * @return float
     */
    private function sum(?float $carry, object $item): float
    {
        $carry += $item->subtotal_price;

        return $carry;
    }
}
