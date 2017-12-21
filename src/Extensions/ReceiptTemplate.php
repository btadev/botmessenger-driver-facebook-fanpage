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
    {
