<?php

require_once 'vendor/autoload.php';

use Illuminate\Container\Container;

$container = new Container();

/**
 * Set container as singleton
 * necessary if we want to use it from another place
 * of the application like the helpers file
 * */ 
Container::setInstance($container);

$container->bind('files', function () {
    return new \Illuminate\Filesystem\Filesystem;
});

/**
 * Add config repository
 * if you want to pass configuration file you can use
 * 'require: path/config.php' as parameter.
 *
 * return new Repository(require 'path/config.php');
 */
$container->bind('config', function (){
   return new \Illuminate\Config\Repository([
       'view' => [
           'paths' => [
               __DIR__ . DIRECTORY_SEPARATOR . 'views'
           ],
           'compiled' => __DIR__ . DIRECTORY_SEPARATOR . 'compiled',
       ]
   ]);
});

$container->bind('view.engine.resolver', function () {
    return new \Illuminate\View\Engines\EngineResolver();
});

$container->bind('events', function () use ($container) {
    return new \Illuminate\Events\Dispatcher($container);
});

# Use View service provider
$viewServiceProvider = new \Illuminate\View\ViewServiceProvider($container);
$viewServiceProvider->register();