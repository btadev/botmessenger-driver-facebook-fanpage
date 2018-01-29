<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use ChienIT\BotMessenger\Interfaces\UserInterface;
use ChienIT\BotMessenger\Users\User as BotMessengerUser;

class User extends BotMessengerUser implements UserInterface
{
    /**
     * @var array
     */
    protected $user_info;

    public function __construct(
        $id = null,
        $first_name = null,
        $last_name = null,
        $username = null,
        array $user_info = []
    ) {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->username = $username;
        $this->user_info = (array) $user_info;
    }

    /**
     * @return string
     */
    public function getProfilePic()
    {
        if (isset($this->user_info['profile_pic'])) {
            return $this->user_info['profile_pic'];
        }

        // Workplace (Facebook for companies) uses picture parameter
        if (isset($this->user_info['picture'])) {
            return $this->user_info['picture']['data']['url'];
        }
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->user_info['locale'] ?? null;
    }

    {
