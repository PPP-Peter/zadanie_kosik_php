<?php

use Eworkssk\ZadaniePhp\ShoppingCartItem;

test('get ShoppingCartItem object', function () {
    expect(defaultItem())->toBeObject();
});

// getters & setters
test('set Quantity', function () {
    $result = (defaultItem())->setQuantity(5);
    expect($result)->toBeInt()->toBe(5);
});

test('get ID', function () {
    $result = defaultItem()->getId();
    expect($result)->toBeInt()->toBe(1);
});

test('get Name', function () {
    $result = defaultItem()->getName();
    expect($result)->toBeString()->toBe("product1");
});

test('get Price', function () {
    $result = defaultItem()->getPrice();
    expect($result)->toBeFloat()->toBe(2.9);
});

test('get Quantity', function () {
    $result = defaultItem()->getQuantity();
    expect($result)->toBeInt()->toBe(3);
});

// other methods
test('get priceWithTax', function () {
    $result = (new ShoppingCartItem(1,'product1', 10,1))->getPriceWithTax();
    expect($result)->toBeFloat()->toBe(12.0);
});

test('show priceWithTax', function () {
    $result = (new ShoppingCartItem(1,'product1', 1,1))->showPriceWithTax();
    expect($result)->toBeString()->toBe('1,20 €');
});

test('get price with discont', function () {
    $result = (new ShoppingCartItem(1,'product1', 100,1))->getPriceWithDiscont(20);
    expect($result)->toBeFloat()->toBe(80.0);
});

test('total price cart item', function () {
    $result = (new ShoppingCartItem(1,'product1', 2.22,3))->totalSum();
    expect($result)->toBeFloat()->toBe(6.66);
});
