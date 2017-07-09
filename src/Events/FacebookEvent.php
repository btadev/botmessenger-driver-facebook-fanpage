<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Events;

use ChienIT\BotMessenger\Interfaces\DriverEventInterface;

abstract class FacebookEvent implements DriverEventInterface
{
    protected $payload;

    /**
received it, or any part of it, contains a notice stating that it is
