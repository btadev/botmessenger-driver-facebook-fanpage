<?php

namespace ChienIT\BotMessenger\Drivers\Facebook;

use Illuminate\Support\Collection;
use ChienIT\BotMessenger\Messages\Attachments\File;
use ChienIT\BotMessenger\Messages\Incoming\IncomingMessage;

class FacebookFileDriver extends FacebookDriver
{
    const DRIVER_NAME = 'FacebookFile';

