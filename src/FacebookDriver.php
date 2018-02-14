<?php

namespace ChienIT\BotMessenger\Drivers\Facebook;

use Illuminate\Support\Collection;
use ChienIT\BotMessenger\Drivers\HttpDriver;
use ChienIT\BotMessenger\Messages\Incoming\Answer;
use ChienIT\BotMessenger\Messages\Attachments\File;
use ChienIT\BotMessenger\Drivers\Facebook\Extensions\User;
use ChienIT\BotMessenger\Interfaces\VerifiesService;
use ChienIT\BotMessenger\Messages\Attachments\Audio;
use ChienIT\BotMessenger\Messages\Attachments\Image;
use ChienIT\BotMessenger\Messages\Attachments\Video;
use ChienIT\BotMessenger\Messages\Outgoing\Question;
use Symfony\Component\HttpFoundation\Request;
use ChienIT\BotMessenger\Drivers\Events\GenericEvent;
use Symfony\Component\HttpFoundation\Response;
use ChienIT\BotMessenger\Interfaces\DriverEventInterface;
use ChienIT\BotMessenger\Drivers\Facebook\Events\MessagingReads;
use Symfony\Component\HttpFoundation\ParameterBag;
use ChienIT\BotMessenger\Drivers\Facebook\Events\MessagingOptins;
use ChienIT\BotMessenger\Messages\Incoming\IncomingMessage;
use ChienIT\BotMessenger\Messages\Outgoing\OutgoingMessage;
use ChienIT\BotMessenger\Drivers\Facebook\Extensions\ListTemplate;
use ChienIT\BotMessenger\Drivers\Facebook\Extensions\MediaTemplate;
use ChienIT\BotMessenger\Drivers\Facebook\Events\MessagingReferrals;
use ChienIT\BotMessenger\Drivers\Facebook\Extensions\ButtonTemplate;
use ChienIT\BotMessenger\Drivers\Facebook\Events\MessagingDeliveries;
use ChienIT\BotMessenger\Drivers\Facebook\Extensions\GenericTemplate;
use ChienIT\BotMessenger\Drivers\Facebook\Extensions\ReceiptTemplate;
use ChienIT\BotMessenger\Drivers\Facebook\Exceptions\FacebookException;

class FacebookDriver extends HttpDriver implements VerifiesService
{
    const HANDOVER_INBOX_PAGE_ID = '263902037430900';

    const TYPE_RESPONSE = 'RESPONSE';
    const TYPE_UPDATE = 'UPDATE';
    const TYPE_MESSAGE_TAG = 'MESSAGE_TAG';

    /** @var string */
    protected $signature;

    /** @var string */
    protected $content;

    /** @var array */
    protected $messages = [];

    /** @var array */
    protected $templates = [
        ButtonTemplate::class,
        GenericTemplate::class,
        ListTemplate::class,
        ReceiptTemplate::class,
        MediaTemplate::class,
    ];

    private $supportedAttachments = [
        Video::class,
        Audio::class,
        Image::class,
        File::class,
    ];

    /** @var DriverEventInterface */
    protected $driverEvent;

    protected $facebookProfileEndpoint = 'https://graph.facebook.com/v2.6/';

    /** @var bool If the incoming request is a FB postback */
    protected $isPostback = false;

    const DRIVER_NAME = 'Facebook';

    /**
     * @param Request $request
     */
    public function buildPayload(Request $request)
    {
        $this->payload = new ParameterBag((array) json_decode($request->getContent(), true));
        $this->event = Collection::make((array) $this->payload->get('entry')[0]);
        $this->signature = $request->headers->get('X_HUB_SIGNATURE', '');
        $this->content = $request->getContent();
        $this->config = Collection::make($this->config->get('facebook', []));
    }

    /**
     * Determine if the request is for this driver.
     *
     * @return bool
     */
    public function matchesRequest()
    {
        $validSignature = empty($this->config->get('app_secret')) || $this->validateSignature();
        $messages = Collection::make($this->event->get('messaging'))->filter(function ($msg) {
            return (isset($msg['message']['text']) || isset($msg['postback']['payload'])) && ! isset($msg['message']['is_echo']);
        });

        return ! $messages->isEmpty() && $validSignature;
    }

    /**
     * @param Request $request
     * @return null|Response
     */
    public function verifyRequest(Request $request)
    {
        if ($request->get('hub_mode') === 'subscribe' && $request->get('hub_verify_token') === $this->config->get('verification')) {
            return Response::create($request->get('hub_challenge'))->send();
        }
    }

    /**
     * @return bool|DriverEventInterface
     */
    public function hasMatchingEvent()
    {
        $event = Collection::make($this->event->get('messaging'))->filter(function ($msg) {
            return Collection::make($msg)->except([
                    'sender',
                    'recipient',
                    'timestamp',
                    'message',
                    'postback',
                ])->isEmpty() === false;
        })->transform(function ($msg) {
            return Collection::make($msg)->toArray();
        })->first();

        if (! is_null($event)) {
            $this->driverEvent = $this->getEventFromEventData($event);

            return $this->driverEvent;
        }

        return false;
    }

    /**
     * @param array $eventData
     * @return DriverEventInterface
     */
    protected function getEventFromEventData(array $eventData)
    {
        $name = Collection::make($eventData)->except([
            'sender',
            'recipient',
            'timestamp',
            'message',
            'postback',
        ])->keys()->first();
        switch ($name) {
            case 'referral':
                return new MessagingReferrals($eventData);
                break;
            case 'optin':
                return new MessagingOptins($eventData);
                break;
            case 'delivery':
                return new MessagingDeliveries($eventData);
                break;
            case 'read':
                return new MessagingReads($eventData);
                break;
            case 'checkout_update':
                return new Events\MessagingCheckoutUpdates($eventData);
                break;
            default:
                $event = new GenericEvent($eventData);
                $event->setName($name);

                return $event;
                break;
        }
    }

    /**
     * @return bool
     */
    protected function validateSignature()
    {
        return hash_equals($this->signature,
            'sha1='.hash_hmac('sha1', $this->content, $this->config->get('app_secret')));
    }

    /**
     * @param IncomingMessage $matchingMessage
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function markSeen(IncomingMessage $matchingMessage)
    {
        $parameters = [
            'recipient' => [
                'id' => $matchingMessage->getSender(),
            ],
            'access_token' => $this->config->get('token'),
            'sender_action' => 'mark_seen',
        ];

        return $this->http->post($this->facebookProfileEndpoint.'me/messages', [], $parameters);
    }

    /**
     * @param IncomingMessage $matchingMessage
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function types(IncomingMessage $matchingMessage)
    {
        $parameters = [
            'recipient' => [
                'id' => $matchingMessage->getSender(),
            ],
            'access_token' => $this->config->get('token'),
            'sender_action' => 'typing_on',
        ];

        return $this->http->post($this->facebookProfileEndpoint.'me/messages', [], $parameters);
    }

    /**
     * @param  IncomingMessage $message
     * @return Answer
     */
     * @var string
