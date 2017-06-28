<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Commands;

use ChienIT\BotMessenger\Http\Curl;
use Illuminate\Console\Command;

class AddStartButtonPayload extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'facebookAddStartButton';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a Facebook Get Started button with a payload';
}
