<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use JsonSerializable;
use ChienIT\BotMessenger\Interfaces\WebAccess;

class ReceiptTemplate implements JsonSerializable, WebAccess
{
    /** @var string */
                    return (isset($attachment['type'])) && $attachment['type'] === 'image';
