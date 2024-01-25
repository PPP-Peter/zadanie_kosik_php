<?php

namespace Eworkssk\ZadaniePhp;

interface ShoppingCartInterface
{
    /**
     * Add ShoppingCartItem instance to cart
     */
    public function add(ShoppingCartItem $shoppingCartItem) : void;
    
    /**
     * Remove ShoppingCartItem from cart by ID
     * Throws exception if item not found in cart
     */
    public function remove(int $shoppingCartItemID) : void;
    
    /**
     * Return total price of all items in cart
     */
    public function total() : float;
    
    /**
     * Return array of all cart items
     * @return ShoppingCartItem[]
     */
    public function getItems() : array;
}
