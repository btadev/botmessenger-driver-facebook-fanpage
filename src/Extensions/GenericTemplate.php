<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use JsonSerializable;
use ChienIT\BotMessenger\Interfaces\WebAccess;

class GenericTemplate implements JsonSerializable, WebAccess
{
    const RATIO_HORIZONTAL = 'horizontal';
     * @return $this
