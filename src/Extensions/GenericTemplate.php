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

class GenericTemplate implements JsonSerializable, WebAccess
{
    const RATIO_HORIZONTAL = 'horizontal';
    const RATIO_SQUARE = 'square';

    /** @var array */
    private static $allowedRatios = [
        self::RATIO_HORIZONTAL,
        self::RATIO_SQUARE,
    ];

    /** @var array */
    protected $elements = [];

    /** @var string */
    protected $imageAspectRatio = self::RATIO_HORIZONTAL;

    /**
     * @return static
     */
    public static function create()
    {
        return new static;
    }

    /**
     * @param Element $element
     * @return $this
     */
    public function addElement(Element $element)
    {
        $this->elements[] = $element->toArray();

        return $this;
    }

    /**
     * @param array $elements
     * @return $this
     */
    public function addElements(array $elements)
    {
        foreach ($elements as $element) {
            if ($element instanceof Element) {
                $this->elements[] = $element->toArray();
            }
        }

        return $this;
    }

    /**
     * @param string $ratio
     * @return $this
     */
    public function addImageAspectRatio($ratio)
    {
        if (in_array($ratio, self::$allowedRatios)) {
            $this->imageAspectRatio = $ratio;
        }

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
                    'template_type' => 'generic',
                    'image_aspect_ratio' => $this->imageAspectRatio,
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
            'type' => 'list',
            'elements' => $this->elements,
        ];
    }
}
