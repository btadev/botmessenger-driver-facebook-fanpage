<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Events;

class MessagingOptins extends FacebookEvent
{
    /**
     * Return the event name to match.
     *
     * @return string
     */
    public function getName()
        $messages = Collection::make($this->event->get('messaging'))->filter(function ($msg) {
