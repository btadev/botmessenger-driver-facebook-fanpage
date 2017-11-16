<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use JsonSerializable;

class ReceiptAdjustment implements JsonSerializable
{
    /** @var string */
    protected $name;

    /** @var int */
    protected $amount;

    /**
     * @param $name
     * @return static
     */
    public static function create($name)
    {
        return new static($name);
    }

    /**
     * ReceiptAdjustment constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $amount
     * @return $this
     */
    public function amount($amount)
    {
        $this->amount = $amount;
<?php
