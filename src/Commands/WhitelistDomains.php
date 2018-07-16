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

class WhitelistDomains extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'facebookWhitelistDomains';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Whitelist domains';

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
        $payload = config('facebook.whitelisted_domains');

        if (! $payload) {
            $this->error('You need to add a Facebook whitelist to your Bot Messenger Facebook config.');
            exit;
        }

        $response = $this->http->post('https://graph.facebook.com/v2.6/me/messenger_profile?access_token='.config('facebook.token'),
            [], ['whitelisted_domains' => $payload]);

        $responseObject = json_decode($response->getContent());

        if ($response->getStatusCode() == 200) {
            $this->info('Domains where whitelisted.');
        } else {
            $this->error('Something went wrong: '.$responseObject->error->message);
        }
    }
}
