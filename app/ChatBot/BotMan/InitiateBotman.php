<?php

namespace Ellllllen\ChatBot\BotMan;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\LaravelCache;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Web\WebDriver;
use Ellllllen\ChatBot\Contracts\InitiateChatbotInterface;

class InitiateBotman implements InitiateChatbotInterface
{
    public function startConversation()
    {
        DriverManager::loadDriver(WebDriver::class);
        $botman = BotManFactory::create(config('botman'), new LaravelCache(), app()->make('request'));

        $botman->hears('hi|hello', function(BotMan $bot) {
            $bot->startConversation(new DefaultConversation());
        });

        $botman->listen();
    }
}