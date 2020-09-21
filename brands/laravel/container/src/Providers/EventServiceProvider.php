<?php

namespace Fulli\Providers;

class EventServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('events', function ($app) {
             # return instance of eventDispatcher
        });
    }
}