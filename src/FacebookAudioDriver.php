<?php

namespace ChienIT\BotMessenger\Drivers\Facebook;

use Illuminate\Support\Collection;
use ChienIT\BotMessenger\Messages\Attachments\Audio;
use ChienIT\BotMessenger\Messages\Incoming\IncomingMessage;

class FacebookAudioDriver extends FacebookDriver
{
    const DRIVER_NAME = 'FacebookAudio';

    /**
     * Determine if the request is for this driver.

