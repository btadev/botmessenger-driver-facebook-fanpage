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
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * @param string $subtitle
     * @return $this
     */
    public function subtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

