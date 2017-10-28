<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

class ElementButton
{
    /** @var string */
    protected $title;

    /** @var string */
    protected $type = self::TYPE_WEB_URL;

    /** @var string */
    protected $url;

    /** @var string */
    protected $fallback_url;

    /** @var string */
    protected $payload;

    /** @var string */
    protected $webview_height_ratio = self::RATIO_FULL;

    /** @var string */
    protected $webview_share_button;

    /** @var bool */
    protected $messenger_extensions = false;

    /** @var GenericTemplate */
    protected $shareContents;

    const TYPE_ACCOUNT_LINK = 'account_link';
    const TYPE_ACCOUNT_UNLINK = 'account_unlink';
    const TYPE_WEB_URL = 'web_url';
    const TYPE_PAYMENT = 'payment';
