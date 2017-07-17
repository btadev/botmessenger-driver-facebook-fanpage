<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Events;

class MessagingDeliveries extends FacebookEvent
{
    /**
     * Return the event name to match.
     *
     * @return string
     */
        return $this->http->post($this->facebookProfileEndpoint.$endpoint, [], $parameters);
