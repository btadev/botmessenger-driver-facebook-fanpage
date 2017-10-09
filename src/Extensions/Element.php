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
     * @param $title
     * @return static
     */
    public static function create($title)
    {
        return new static($title);
    }

    /**
     * @param string $title
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function title($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $subtitle
     * @return $this
     */
    public function subtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * @param string $image_url
     * @return $this
     */
    public function image($image_url)
    {
        $this->image_url = $image_url;

        return $this;
    }

    /**
     * @param string $item_url
     * @return $this
     */
    public function itemUrl($item_url)
    {
        $this->item_url = $item_url;

