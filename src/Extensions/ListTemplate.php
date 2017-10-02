<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use JsonSerializable;
use ChienIT\BotMessenger\Interfaces\WebAccess;

class ListTemplate implements JsonSerializable, WebAccess
{
    /** @var array */
    protected $elements = [];

    /** @var array */
use Symfony\Component\HttpFoundation\Response;
