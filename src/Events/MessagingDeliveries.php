<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Events;

class MessagingDeliveries extends FacebookEvent
{
    /**
     * Return the event name to match.
     *
     * @return string
     */
    public function getName()
    {
        return 'messaging_deliveries';
    }
}
     * Get the instance as a web accessible array.
