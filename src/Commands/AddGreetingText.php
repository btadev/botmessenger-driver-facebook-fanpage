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

class AddGreetingText extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'facebookAddGreetingText';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a Facebook Greeting Text to your message start screen.';

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
        $payload = config('facebook.greeting_text');

        if (! $payload) {
            $this->error('You need to add a Facebook greeting text to your Bot Messenger Facebook config.');
            exit;
        }

        $response = $this->http->post(
            'https://graph.facebook.com/v2.6/me/messenger_profile?access_token='.config('facebook.token'),
            [], $payload);

        $responseObject = json_decode($response->getContent());

        if ($response->getStatusCode() == 200) {
            $this->info('Greeting text was set.');
        } else {
            $this->error('Something went wrong: '.$responseObject->error->message);
        }
    }
}
