<?php

/**
 * Load Composer autoload
 */
require 'vendor/autoload.php';

/**
 * Start Machine
 */
$app = require_once 'bootstrap.php';


/**
 * When we build an object from a container,
 * it checks if its dependencies are registered and
 * injects the linked dependencies
 */
$app->bind(
    \Fulli\Contracts\DependencyInterface::class,
    \Fulli\Injection\Dependency::class
);

/**
 * Create and use DummyClass
 */
$dummy = $app->make(\Fulli\Injection\DummyClass::class);
$dummy->sayHello();
