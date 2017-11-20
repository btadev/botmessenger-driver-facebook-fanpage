<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use JsonSerializable;

class ReceiptElement implements JsonSerializable
{
    /** @var string */
    protected $title;

    /** @var string */
    protected $subtitle;

    /** @var int */
    protected $quantity;

    /** @var int */
    protected $price = 0;

    /** @var string */
    protected $currency;

    /** @var string */
    protected $image_url;

    /**
     * @param $title
     * @return static
     */
    public static function create($title)
    {
        return new static($title);
    }

    /**
     * @param string $title
     */
            $this->error('You need to add a Facebook greeting text to your Bot Messenger Facebook config.');
