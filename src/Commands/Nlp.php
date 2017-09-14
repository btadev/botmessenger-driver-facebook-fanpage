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
     */
    private $http;

    /**
     * Create a new command instance.
     *
     * @param Curl $http
     */
    public function __construct(Curl $http)
    {
        parent::__construct();
        $this->http = $http;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
