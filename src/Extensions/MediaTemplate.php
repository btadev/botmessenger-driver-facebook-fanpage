<?php

/*
 * This file is part of Facebook Messenger Fanpage driver for ChienIT Bot Messenger.
 *
 * (c) Nguyen Duc Chien <chiendevit@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use JsonSerializable;
use ChienIT\BotMessenger\Interfaces\WebAccess;

class MediaTemplate implements JsonSerializable, WebAccess
{
    /** @var string */
    protected $mediaType;

    /** @var array */
    protected $elements = [];

    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    /**
     * @param $element
     * @return $this
     */
    public function element($element)
    {
        $this->elements = [$element->toArray()];

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'attachment' => [
                'type' => 'template',
                'payload' => [
                    'template_type' => 'media',
                    'elements' => $this->elements,
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * Get the instance as a web accessible array.
     * This will be used within the WebDriver.
     *
     * @return array
     */
    public function toWebDriver()
    {
        return [
            'type' => $this->mediaType,
            'elements' => $this->elements,
        ];
    }
}
