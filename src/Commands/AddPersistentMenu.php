<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Commands;

use ChienIT\BotMessenger\Http\Curl;
use Illuminate\Console\Command;

class AddPersistentMenu extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'facebookAddMenu';

