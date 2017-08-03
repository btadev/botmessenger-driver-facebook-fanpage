<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use JsonSerializable;
use ChienIT\BotMessenger\Interfaces\WebAccess;

class ButtonTemplate implements JsonSerializable, WebAccess
{
    /** @var string */
    protected $text;
    /**
