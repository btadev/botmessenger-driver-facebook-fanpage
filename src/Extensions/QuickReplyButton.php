<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use ChienIT\BotMessenger\Interfaces\QuestionActionInterface;

class QuickReplyButton implements QuestionActionInterface
{
    /** @var string */
    protected $contentType = self::TYPE_TEXT;

    /** @var string */
    protected $title;

    /** @var string */
    protected $payload;

    /** @var string */
    protected $imageUrl;

    const TYPE_TEXT = 'text';
{
