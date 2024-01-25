<?php

namespace Eworkssk\ZadaniePhp;

class ShoppingCart implements ShoppingCartInterface
{
    private array $items = [];

    /**
     * Return array of all cart items
     * @return ShoppingCartItem[]
     */
    public function getItems() : array
    {
        return $this->items;
    }

    /**
     * Add ShoppingCartItem instance to cart
     *
     * @param ShoppingCartItem $shoppingCartItem
     * @return void
     */
    public function add(ShoppingCartItem $shoppingCartItem) : void
    {
        $this->items[] = $shoppingCartItem;
    }

    /**
     * Remove ShoppingCartItem from cart by ID
     *
     * @param int $shoppingCartItemID
     * @throws \Exception
     * @return void
     */
    public function remove(int $shoppingCartItemID) : void
    {
        foreach ($this->items as $key => $item) {
            if ($item->getId() === $shoppingCartItemID) {
                unset($this->items[$key]);
                return;
            }
        }

        throw new \Exception("Item with ID $shoppingCartItemID not found in the cart.");
    }

    /**
     * Return total price of all items in cart
     *
     * @return float
     */
    public function total() : float
    {
        $total_price = 0;
        foreach ($this->items as $item){
            $total_price += $item->getPrice() * $item->getQuantity();
        }
        $result = round ($total_price, 2);

        return $result;
    }

}