<?php

namespace Fulli;

use Fulli\Providers\ServiceProvider;
use Illuminate\Container\Container;

class Application extends Container
{
    /**
     * Indicates if the application has "booted".
     *
     * @var bool
     */
    protected $booted = false;


    /**
     * All of the registered service providers.
     *
     * @var ServiceProvider[]
     */
    protected $serviceProviders = [];


    public function __construct()
    {
        static::setInstance($this);
        $this->instance('app', $this);
    }


    /**
     * Register a service provider with the application.
     *
     * @param  ServiceProvider $provider
     * @param  bool  $force
     * @return ServiceProvider
     */
    public function register(ServiceProvider $provider, $force = false)
    {
        if (($registered = $this->getProvider($provider)) && ! $force) {
            return $registered;
        }

        $provider->register();
        $this->markAsRegistered($provider);

        // If the application has already booted, we will call this boot method on
        // the provider class so it has an opportunity to do its boot logic and
        // will be ready for any usage by this developer's application logic.
        if ($this->booted) {
            $this->bootProvider($provider);
        }

        return $provider;
    }

    /**
     * Mark the given provider as registered.
     *
     * @param ServiceProvider $provider
     * @return void
     */
    protected function markAsRegistered($provider)
    {
        $this->serviceProviders[get_class($provider)] = $provider;
    }


    /**
     * Get the registered service provider instance if it exists.
     *
     * @param ServiceProvider $provider
     * @return ServiceProvider|null
     */
    public function getProvider($provider)
    {
        return $this->serviceProviders[get_class($provider)] ?? null;
    }


    /**
     * Boot the given service provider.
     *
     * @param ServiceProvider $provider
     * @return mixed|void
     */
    protected function bootProvider(ServiceProvider $provider)
    {
        if (method_exists($provider, 'boot')) {
            return $this->call([$provider, 'boot']);
        }
    }


    /**
     * Boot the application's service providers.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->booted) {
            return;
        }

        // Run boot method on registered providers
        array_walk($this->serviceProviders, function ($p) {
            $this->bootProvider($p);
        });

        $this->booted = true;
    }

}
