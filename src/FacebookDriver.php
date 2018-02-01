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
    /**
