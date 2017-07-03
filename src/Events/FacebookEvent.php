<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Events;

use ChienIT\BotMessenger\Interfaces\DriverEventInterface;

abstract class FacebookEvent implements DriverEventInterface
{
    protected $payload;

    /**
     * @param $payload
        return 'messaging_checkout_updates';
