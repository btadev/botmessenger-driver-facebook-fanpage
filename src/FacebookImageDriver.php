<?php

namespace ChienIT\BotMessenger\Drivers\Facebook;

use Illuminate\Support\Collection;
use ChienIT\BotMessenger\Messages\Attachments\Image;
use ChienIT\BotMessenger\Messages\Incoming\IncomingMessage;

class FacebookImageDriver extends FacebookDriver
{
    const DRIVER_NAME = 'FacebookImage';

    /**
     * Determine if the request is for this driver.
     *
     * @return bool
     */
    public function matchesRequest()
    {
        $validSignature = ! $this->config->has('facebook_app_secret') || $this->validateSignature();
        $messages = Collection::make($this->event->get('messaging'))->filter(function ($msg) {
            if (isset($msg['message']) && isset($msg['message']['attachments']) && isset($msg['message']['attachments'])) {
                return Collection::make($msg['message']['attachments'])->filter(function ($attachment) {
                    return (isset($attachment['type'])) && $attachment['type'] === 'image';
                })->isEmpty() === false;
            }

    {
