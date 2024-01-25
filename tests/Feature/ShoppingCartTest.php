<?php

use Eworkssk\ZadaniePhp\ShoppingCart;
use Eworkssk\ZadaniePhp\ShoppingCartItem;

require 'src/ShoppingCart.php';


test('get card items ', function() {
    $card = new ShoppingCart();
    $item1 = new ShoppingCartItem(1, 'Produkt 1', 10.99, 2);
    $item2 = new ShoppingCartItem(2, 'Produkt 2', 15.99, 1);

    // Pridanie poloziek do kosika
    $card->add($item1);
    $card->add($item2);

    // Ziskanie poloziek kosika
    $items = $card->getItems();

    expect($items)->toBeArray();
    $this->assertCount(2, $items);
    $this->assertSame($item1, $items[0]);
    $this->assertSame($item2, $items[1]);
});


test('add item to cart', function() {
    $card = new ShoppingCart();
    $cardItem = new ShoppingCartItem(1, 'Produkt 1', 10.99, 4);

    // Pridanie poloziek do kosika
    $card->add($cardItem);
    $card->add($cardItem);

    // Ziskanie poloziek kosika
    $items = $card->getItems();

    // Overi pocet poloziek v kosiku a parametre polozky
    $this->assertCount(2, $items);
    $this->assertSame($cardItem, $items[0]);
    expect($items)->toBeArray();
});


test('success remove item from cart', function() {
    $card = new ShoppingCart();
    $cardItem1 = new ShoppingCartItem(1, 'Produkt 1', 10.99, 4);
    $cardItem2 = new ShoppingCartItem(2, 'Produkt 2', 6.10, 1);

    // Pridanie poloziek do kosika
    $card->add($cardItem1);
    $card->add($cardItem2);

    // odstrani polozku 1
    $card->remove(2);

    // Overi pocet poloziek v kosiku a polozku
    $items = $card->getItems();
    $this->assertCount(1, $items);
    $this->assertSame($cardItem1, $items[0]);

    // Overi ci je kosik prazdny po odstraneni 2. polozky
    $card->remove(1);
    expect($card->getItems())->toBeEmpty();
});


test('failed remove item from cart', function() {
    $card = new ShoppingCart();
    $cardItem = new ShoppingCartItem(1, 'Produkt 1', 10.99, 4);
    $cardItemID = 5;

    // Pridanie poloziek do kosika
    $card->add($cardItem);

    expect(fn() => $card->remove($cardItemID))->toThrow(new Exception("Item with ID $cardItemID not found in the cart."));
});


test('total price cart', function() {
    $card = new ShoppingCart();
    $cardItem1 = new ShoppingCartItem(1, 'Produkt 1', 10.99, 1);
    $cardItem2 = new ShoppingCartItem(2, 'Produkt 2', 5, 3);
    $cardItem3 = new ShoppingCartItem(3, 'Produkt 3', 50, 1);

    // Pridanie poloziek do kosika
    $card->add($cardItem1);
    $card->add($cardItem2);
    $card->add($cardItem3);
    $card->remove(3);

    $result = $card->total();
    expect($result)->toBeFloat()->toBe(25.99);
});