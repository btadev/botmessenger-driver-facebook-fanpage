<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use JsonSerializable;

class ReceiptAddress implements JsonSerializable
{
    /** @var string */
    protected $street_1;

    /** @var string */
    protected $street_2;

     *
