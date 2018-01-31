<?php

namespace ChienIT\BotMessenger\Drivers\Facebook;

use Illuminate\Support\Collection;
use ChienIT\BotMessenger\Messages\Attachments\Audio;
use ChienIT\BotMessenger\Messages\Incoming\IncomingMessage;

class FacebookAudioDriver extends FacebookDriver
{
    const DRIVER_NAME = 'FacebookAudio';

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
                    return (isset($attachment['type'])) && $attachment['type'] === 'audio';
                })->isEmpty() === false;
            }

            return false;
        });

        return ! $messages->isEmpty() && $validSignature;
    }

    /**
     * Retrieve the chat message.
     *
     * @return array
     */
    public function getMessages()
    {
        if (empty($this->messages)) {
            $this->loadMessages();
        }

        return $this->messages;
    }

    /**
     * Load Facebook messages.
     */
    protected function loadMessages()
    {
        $messages = Collection::make($this->event->get('messaging'))->filter(function ($msg) {
            return isset($msg['message']) && isset($msg['message']['attachments']) && isset($msg['message']['attachments']);
        })->transform(function ($msg) {
            $message = new IncomingMessage(Audio::PATTERN, $msg['sender']['id'], $msg['recipient']['id'], $msg);
            $message->setAudio($this->getAudioUrls($msg));

            return $message;
        })->toArray();

        if (count($messages) === 0) {
            $messages = [new IncomingMessage('', '', '')];

