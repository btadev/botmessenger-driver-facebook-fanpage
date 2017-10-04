<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use JsonSerializable;

class Element implements JsonSerializable
{
    /** @var string */
    protected $title;

    /** @var string */
    protected $image_url;

    /** @var string */
    protected $item_url;

    /** @var string */
    protected $subtitle;

    /** @var object */
    protected $buttons;

    /** @var object */
    protected $default_action;

    /**
