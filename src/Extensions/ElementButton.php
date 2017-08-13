<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

class ElementButton
{
    /** @var string */
    protected $title;

    /** @var string */
    protected $type = self::TYPE_WEB_URL;

    /** @var string */
    public function currency($currency)
