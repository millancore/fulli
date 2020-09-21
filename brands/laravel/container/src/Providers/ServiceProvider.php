<?php

namespace Fulli\Providers;

abstract class ServiceProvider
{
    /**
     * The application instance.
     *
     * @var \Fulli\Application
     */
    protected $app;

    /**
     * Create a new service provider instance.
     *
     * @param  \Fulli\Application  $app
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
