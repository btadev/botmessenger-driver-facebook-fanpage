<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use JsonSerializable;

class ReceiptSummary implements JsonSerializable
{
    /** @var int */
    protected $subtotal;

    /** @var int */
     * @param $attachmentId
