<?php

namespace Eworkssk\ZadaniePhp;

class ShoppingCartItem
{
    private int $id;
    private string $name;
    private float $price;
    private int $quantity;

    /**
     * @param int $id
     * @param string $name
     * @param float $price
     * @param int $quantity
     */
    public function __construct(int $id, string $name, float $price, int $quantity)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): int
    {
        return $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * Get Price with Tax
     *
     * @param int $tax_rate
     * @return float
     */
    public function getPriceWithTax(float $tax_rate = 20) : float
    {
       $result = $this->price + $this->price * ($tax_rate/100);
       $result = round($result, 2);
       return $result;
    }

    /**
     * Show Price with Tax
     *
     * @return string
     */

    public function showPriceWithTax() : string
    {
        $result = $this->getPriceWithTax();
        $result_round = number_format($result, 2, ',', '');
        return $result_round . ' €';
    }

    /**
     * Get Price with Discount
     *
     * @param int $discount
     * @return float
     */
    public function getPriceWithDiscont(float $discount) : float
    {
        $result = $this->price / 100 * (100 - $discount);
        $result_round = round($result, 2);
        return $result_round;
    }

    /**
     * Get Total Sum
     *
     * @param int $specialSaleDiscount
     * @return float
     */
    public function totalSum(int $specialSaleDiscount = null) : float
    {
        return $this->price * $this->quantity;
    }

}