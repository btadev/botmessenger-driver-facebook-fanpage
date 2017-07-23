<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Events;

class MessagingPostbacks extends FacebookEvent
{
    /**
     * Return the event name to match.
     *
     * @return string
     */
    public function getName()
    {
        return 'messaging_postbacks';
    }
                    'order_number' => $this->order_number,
