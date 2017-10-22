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
    }

    /**
     * @param $mediaType
     */
    public function __construct($mediaType)
    {
        $this->media_type = $mediaType;
    }

    /**
     * @param $url
     * @return $this
     */
    public function url($url)
    {
        $this->url = $url;

    /**
