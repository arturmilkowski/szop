<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\{Type, Item};

class Basket
{
    private const BASKETNAME = 'basket.items';
    private const TOTAL_PRICE_NAME = 'basket.totalPrice';

    /**
     * Add product to basket.
     *
     * @param Type $type Type of product.
     * 
     * @return Item
     */
    public function add(Type $type): Item
    {
        $orderItem = $this->getProductFromBasket($type->id);
        if ($orderItem) {
            $isEnough = $this->isEnoughType($type, $orderItem);
            if ($isEnough) {
                $this->increaseQuantity($orderItem);
            }

            return $orderItem;
        }

        $orderItem = $this->addProductToBasket($type);
        $this->setTotalPrice();

        return $orderItem;
    }

    /**
     * Remove product from basket.
     *
     * @param Type $type Type of product.
     * 
     * @return boolean
     */
    public function remove(Type $type): bool
    {
        $orderItem = $this->getProductFromBasket($type->id);

        if ($orderItem == null) {
            return false;
        }

        $orderItem->quantity--;
        $orderItem->subtotal_price = $orderItem->quantity * $orderItem->price;

        session()->put($this->setIDProductInBasket($type->id), $orderItem);

        if ($orderItem->quantity == 0) {
            $this->forget($type->id);

            return true;
        }

        $this->setTotalPrice();

        return true;
    }

    /**
     * Clear all products from basket.
     *
     * @return boolean
     */
    public function clear(): bool
    {
        session()->forget('basket');

        return true;
    }

    /**
     * If the basket has no products.
     *
     * @return boolean
     */
    public function isClear(): bool
    {
        if (session()->has('basket')) {
            return false;
        }

        return true;
    }

    /**
     * All products from basket.
     *
     * @return array
     */
    public function getItems(): array
    {
        if (session()->get('basket.items') == null) {
            return [];
        }

        return session()->get('basket.items');
    }

    /**
     * Product count.
     *
     * @return integer
     */
    public function productsCount(): int
    {
        if (session()->get(Basket::BASKETNAME) == null) {
            return 0;
        }

        $count = array_reduce(session(Basket::BASKETNAME), [$this, 'count']);

        return $count;
    }

    /**
     * Return distinct products count.
     *
     * @return integer
     */
    public function distinctProductsCount(): int
    {
        if (session()->get(Basket::BASKETNAME) == null) {
            return 0;
        }

        return count(session()->get(Basket::BASKETNAME));
    }

    /**
     * Basket total price.
     *
     * @return float
     */
    public function totalPrice(): float
    {
        if (session(Basket::TOTAL_PRICE_NAME) == null) {
            return 0;
        }

        return session(Basket::TOTAL_PRICE_NAME);
    }

    /**
     * Sum of total price and delivery cost.
     *
     * @return float
     */
    public function totalPriceAndDeliveryCost(float $deliveryCost): float
    {
        return session(Basket::TOTAL_PRICE_NAME) + $deliveryCost;
    }

    // private functions -----------------------------------------------------

    /**
     * Set basket total price.
     *
     * @return void
     */
    private function setTotalPrice(): void
    {
        $totalPrice = array_reduce(session(Basket::BASKETNAME), [$this, 'sum']);

        session([Basket::TOTAL_PRICE_NAME => $totalPrice]);
    }

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

    /**
     * Forget product from session.
     * Forget basket when no products.
     *
     * @param integer $productID Type ID
     * 
     * @return void
     */
    private function forget(int $productID): void
    {
        // remove product from basket
        session()->forget($this->setIDProductInBasket($productID));

        // remove all basket
        if ($this->productsCount() == 0) {
            session()->forget('basket');
        }
    }

    /**
     * Get product from basket.
     *
     * @param integer $productID Product ID
     * 
     * @return Item|null
     */
    private function getProductFromBasket(int $productID): ?Item
    {
        $productInBasketID = $this->setIDProductInBasket($productID);

        return session($productInBasketID);
    }

    /**
     * Set the ID for the product in basket.
     * (Add prefix)
     *
     * @param integer $ID Product ID.
     * 
     * @return string
     */
    private function setIDProductInBasket(int $ID): string
    {
        return Basket::BASKETNAME . '.' . $ID;
    }

    /**
     * Create Order Item and save it in session.
     *
     * @param Type $type Type of product.
     * 
     * @return Item
     */
    private function addProductToBasket(Type $type): Item
    {
        $orderItem = $this->createOrderItem($type);
        $productInBasketID = $this->setIDProductInBasket($type->id);

        session([$productInBasketID => $orderItem]);

        return $orderItem;
    }

    /**
     * Create speciacreate special product for basket.
     *
     * @param Type $type Type of product.
     * 
     * @return Item
     */
    private function createOrderItem(Type $type): Item
    {
        $item = new Item();

        $item->type_id = $type->id;
        $item->type_name = $type->name;
        $item->type_size_id = $type->size_id;
        $item->name = $type->product->name;
        $item->concentration = $type->product->concentration->name;
        $item->category = $type->product->category->name;  // concentration->
        $item->price = $type->price;
        $item->quantity = 1;
        $item->subtotal_price = $type->price;

        return $item;
    }

    /**
     * Increase the amount of product in the basket.
     *
     * @param Item $orderItem Product in basket.
     * 
     * @return Item
     */
    private function increaseQuantity(Item $orderItem): Item
    {
        $orderItem->quantity++;
        $orderItem->subtotal_price = $orderItem->quantity * $orderItem->price;

        $this->setTotalPrice();

        return $orderItem;
    }

    /**
     * Check if there is enough product of a given type in the database.
     *
     * @param Type $type      Type
     * @param Item $orderItem Order Item
     * 
     * @return boolean
     */
    private function isEnoughType(Type $type, Item $orderItem): bool
    {
        return $type->quantity > $orderItem->quantity;
    }
}
