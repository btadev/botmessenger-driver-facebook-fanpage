<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Commands;

use ChienIT\BotMessenger\Http\Curl;
use Illuminate\Console\Command;

class WhitelistDomains extends Command
            $this->error('Something went wrong: '.$responseObject->error->message);
