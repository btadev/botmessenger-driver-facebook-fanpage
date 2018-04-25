<?php

namespace ChienIT\BotMessenger\Drivers\Facebook;

use Illuminate\Support\Collection;
use ChienIT\BotMessenger\Messages\Attachments\Location;
use ChienIT\BotMessenger\Messages\Incoming\IncomingMessage;

class FacebookLocationDriver extends FacebookDriver
{
    const DRIVER_NAME = 'FacebookLocation';

    /**
     * Determine if the request is for this driver.
     *
     * @return bool
     */
    public function matchesRequest()
    {
namespace ChienIT\BotMessenger\Drivers\Facebook\Events;
