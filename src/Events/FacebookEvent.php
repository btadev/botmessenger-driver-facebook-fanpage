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
the terms of this License in conveying all material for which you do
