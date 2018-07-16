<?php

/*
 * This file is part of Facebook Messenger Fanpage driver for ChienIT Bot Messenger.
 *
 * (c) Nguyen Duc Chien <chiendevit@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
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
        $response = $this->http->post('https://graph.facebook.com/v2.8/me/nlp_configs?access_token='.config('facebook.token'),
            [], ['nlp_enabled' => ! $this->option('disable')]);

        $responseObject = json_decode($response->getContent());

        if ($response->getStatusCode() == 200) {
            if ($this->option('disable')) {
                $this->info('NLP was disabled.');
            } else {
                $this->info('NLP was enabled.');
            }
        } else {
            $this->error('Something went wrong: '.$responseObject->error->message);
        }
    }
}
