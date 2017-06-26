<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Commands;

use ChienIT\BotMessenger\Http\Curl;
use Illuminate\Console\Command;

class Nlp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'facebookNlp {--disable}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enable/Disable Facebooks built-in natural language processing';

    /**
     * @var Curl
