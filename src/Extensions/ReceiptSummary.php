<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use JsonSerializable;

class ReceiptSummary implements JsonSerializable
{
    /** @var int */
    protected $subtotal;

    /** @var int */
    protected $shipping_cost;
    public static function create($title = '')
