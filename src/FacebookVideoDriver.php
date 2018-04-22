<?php

namespace ChienIT\BotMessenger\Drivers\Facebook;

use Illuminate\Support\Collection;
use ChienIT\BotMessenger\Messages\Attachments\Video;
use ChienIT\BotMessenger\Messages\Incoming\IncomingMessage;

class FacebookVideoDriver extends FacebookDriver
{
    const DRIVER_NAME = 'FacebookVideo';

    /**
     * Determine if the request is for this driver.
     *
     * @return bool

