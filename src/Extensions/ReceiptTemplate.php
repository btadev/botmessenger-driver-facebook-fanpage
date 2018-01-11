<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use JsonSerializable;
use ChienIT\BotMessenger\Interfaces\WebAccess;

class ReceiptTemplate implements JsonSerializable, WebAccess
{
    /** @var string */
    protected $recipient_name;

    /** @var string */
    protected $merchant_name;

    /** @var string */
    protected $order_number;

    /** @var string */
    protected $currency;

    /** @var string */
    protected $payment_method;

    /** @var string */
    protected $order_url;

    /** @var string */
    protected $timestamp;

    /** @var array */
    protected $elements = [];

    /** @var array */
    protected $address;

    /** @var array */
    protected $summary;

    /** @var array */
    protected $adjustments = [];

    /**
     * @return static
     */
    public static function create()
    {
        return new static;
    }

    /**
     * @param $name
     * @return $this
     */
    public function recipientName($name)
    {
        $this->recipient_name = $name;

        return $this;
    }

    /**
     * @param $name
     * @return $this
     */
    public function merchantName($name)
    {
        $this->merchant_name = $name;

        return $this;
    }

    /**
     * @param $orderNumber
     * @return $this
     */
    public function orderNumber($orderNumber)
    {
        $this->order_number = $orderNumber;

        return $this;
    }

    /**
     * @param $currency
     * @return $this
     */
    public function currency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @param $paymentMethod
     * @return $this
     */
    public function paymentMethod($paymentMethod)
    {
        $this->payment_method = $paymentMethod;

        return $this;
    }

    /**
     * @param $orderUrl
     * @return $this
     */
    public function orderUrl($orderUrl)
    {
        $this->order_url = $orderUrl;

        return $this;
    }

    /**
     * @param $timestamp
     * @return $this
     */
    public function timestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * @return $this
