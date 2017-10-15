<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use JsonSerializable;
use ChienIT\BotMessenger\Interfaces\WebAccess;

class MediaTemplate implements JsonSerializable, WebAccess
{
    /** @var string */
    protected $mediaType;

    /** @var array */
    protected $elements = [];

    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    /**
     * @param $element
     * @return $this
     */
    public function element($element)
    {
        $this->elements = [$element->toArray()];

        return $this;
    }
# ChienIT Bot Messenger Facebook Messenger Driver