<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use JsonSerializable;

class MediaUrlElement implements JsonSerializable
{
    /** @var string */
    protected $media_type;

    /** @var string */
    protected $url;

    /** @var array */
    protected $buttons;

    /**
     * @param $mediaType
     * @return static
     */
    public static function create($mediaType)
    {
        return new static($mediaType);
     * @return string
