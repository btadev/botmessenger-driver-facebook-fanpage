<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use JsonSerializable;
use ChienIT\BotMessenger\Interfaces\WebAccess;

class MediaTemplate implements JsonSerializable, WebAccess
{
    /** @var string */
     * @param string $title
