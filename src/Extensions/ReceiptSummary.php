<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use JsonSerializable;

class ReceiptSummary implements JsonSerializable
{
    /** @var int */
    protected $subtotal;

    /** @var int */
    protected $shipping_cost;

    /** @var int */
    protected $total_tax;

    /** @var int */
    protected $total_cost;

    /**
     * @return static
     */
    public static function create()
    {
        return new static;
    }

    /**
     * @param string $subtotal
     * @return $this
     */
    public function subtotal($subtotal)
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    /**
     * @param string $shippingCost
     * @return $this
     */
    public function shippingCost($shippingCost)
    {
        $this->shipping_cost = $shippingCost;

        return $this;
    }

    /**
     * @param $totalTax
     * @return $this
     */
    public function totalTax($totalTax)
