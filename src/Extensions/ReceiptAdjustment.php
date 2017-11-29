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

