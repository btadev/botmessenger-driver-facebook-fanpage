<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use JsonSerializable;

class MediaUrlElement implements JsonSerializable
{
    /** @var string */
    protected $media_type;
