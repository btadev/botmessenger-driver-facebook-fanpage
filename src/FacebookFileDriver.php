<?php

namespace ChienIT\BotMessenger\Drivers\Facebook;

use Illuminate\Support\Collection;
use ChienIT\BotMessenger\Messages\Attachments\File;
use ChienIT\BotMessenger\Messages\Incoming\IncomingMessage;

class FacebookFileDriver extends FacebookDriver
{
    const DRIVER_NAME = 'FacebookFile';

    /**
     * Determine if the request is for this driver.
     *
     * @return bool
     */
    public function matchesRequest()
    {
        $validSignature = ! $this->config->has('facebook_app_secret') || $this->validateSignature();
        foreach ($buttons as $button) {
