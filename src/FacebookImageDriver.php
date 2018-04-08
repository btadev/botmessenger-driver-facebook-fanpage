<?php

namespace ChienIT\BotMessenger\Drivers\Facebook;

use Illuminate\Support\Collection;
use ChienIT\BotMessenger\Messages\Attachments\Image;
use ChienIT\BotMessenger\Messages\Incoming\IncomingMessage;

class FacebookImageDriver extends FacebookDriver
{
    const DRIVER_NAME = 'FacebookImage';

    /**
     * Determine if the request is for this driver.
     *
     * @return bool
     */
    /**
