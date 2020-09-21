<?php

require_once 'vendor/autoload.php';

use Fulli\Application;

/**
 *  Instance new Application Container
 */
$app = new Application;


/**
 * Register Core Providers
 */
$app->register(new \Fulli\Providers\EventServiceProvider($app));
//$app->register(new \Fulli\Providers\LogServiceProvider($app));
//..


return $app;