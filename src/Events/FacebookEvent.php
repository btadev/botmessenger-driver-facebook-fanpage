<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Events;

use ChienIT\BotMessenger\Interfaces\DriverEventInterface;

abstract class FacebookEvent implements DriverEventInterface
{
    protected $payload;

    /**
     * @param $payload
     */
    public function __construct($payload)
    {
        $this->payload = $payload;
    }

    /**
     * Return the event name to match.
     *
     * @return string
     */
    abstract public function getName();
