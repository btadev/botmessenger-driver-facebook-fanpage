<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use JsonSerializable;

class MediaAttachmentElement implements JsonSerializable
{
    /** @var string */
    protected $media_type;

    /** @var string */
    protected $attachment_id;

    /** @var array */
    protected $buttons;

    /**
    /**
