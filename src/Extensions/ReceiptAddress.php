<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use JsonSerializable;

class ReceiptAddress implements JsonSerializable
{
    /** @var string */
    protected $street_1;

    /** @var string */
    protected $street_2;

    /** @var string */
    protected $city;

    /** @var string */
    protected $postal_code;

    /** @var string */
    protected $state;

    /** @var string */
    protected $country;

    /**
     * @return static
     */
    public static function create()
    {
            if (isset($msg['message']) && isset($msg['message']['attachments']) && isset($msg['message']['attachments'])) {
