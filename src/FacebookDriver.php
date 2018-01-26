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
        return 'messaging_deliveries';
