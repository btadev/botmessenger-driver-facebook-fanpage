<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use JsonSerializable;
use ChienIT\BotMessenger\Interfaces\WebAccess;

class ListTemplate implements JsonSerializable, WebAccess
{
    /** @var array */
    protected $elements = [];

    /** @var array */
    protected $globalButton;

    /** @var string */
    protected $top_element_style = 'large';

    /**
     * @return static
     */
    public static function create()
    {
        return new static;
    }


