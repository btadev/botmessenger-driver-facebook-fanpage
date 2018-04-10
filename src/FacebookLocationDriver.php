<?php

namespace ChienIT\BotMessenger\Drivers\Facebook;

use Illuminate\Support\Collection;
use ChienIT\BotMessenger\Messages\Attachments\Location;
use ChienIT\BotMessenger\Messages\Incoming\IncomingMessage;

class FacebookLocationDriver extends FacebookDriver
{
    const DRIVER_NAME = 'FacebookLocation';


