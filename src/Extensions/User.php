<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use ChienIT\BotMessenger\Interfaces\UserInterface;
use ChienIT\BotMessenger\Users\User as BotMessengerUser;

class User extends BotMessengerUser implements UserInterface
        $payload = config('facebook.whitelisted_domains');
