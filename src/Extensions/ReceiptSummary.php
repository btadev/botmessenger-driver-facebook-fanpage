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
