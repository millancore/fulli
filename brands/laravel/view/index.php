<?php

require_once 'vendor/autoload.php';

use Illuminate\View\ViewServiceProvider;
use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;

$container = new Container();

Container::setInstance($container);

$container['files'] = new Filesystem();
$container['config'] = new \Illuminate\Config\Repository([]);

$container['view.engine.resolver'] = new \Illuminate\View\Engines\EngineResolver();
$container['events'] = new \Illuminate\Events\Dispatcher($container);

$container['config']['view.paths'] = [ __DIR__ . DIRECTORY_SEPARATOR . 'views'];
$container['config']['view.compiled'] = __DIR__ . DIRECTORY_SEPARATOR . 'compiled';

$viewServiceProvider = new ViewServiceProvider($container);

$viewServiceProvider->register();

/*$viewServiceProvider->registerViewFinder();
$viewServiceProvider->registerBladeCompiler();
$viewServiceProvider->registerEngineResolver();
$viewServiceProvider->registerFactory();*/

print view('default', [
    'greetings' => 'Hello Illuminate View!'
]);

