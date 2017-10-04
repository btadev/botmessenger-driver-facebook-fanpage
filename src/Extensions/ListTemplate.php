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
     * @param ElementButton $button
     * @return $this
     */
    public function addGlobalButton(ElementButton $button)
    {
        $this->globalButton = $button->toArray();

        return $this;
    }
                }
