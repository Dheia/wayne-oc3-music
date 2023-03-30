<?php namespace Albus\MusicBox\Classes;

use Event;
use Telegram\Bot\Laravel\TelegramServiceProvider;
use Albus\MusicBox\Classes\Event\Track\TrackModelHandler;

/**
 * Plugin Boot
 */
trait Boot {

    public function boot()
    {
        $this->app->register(TelegramServiceProvider::class);

        Event::subscribe(TrackModelHandler::class);
    }

}