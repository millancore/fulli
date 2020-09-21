<?php

namespace Fulli\Injection;

use Fulli\Contracts\DependencyInterface;

class DummyClass
{
    private $dependency;

    public function __construct(DependencyInterface $dependency)
    {
        $this->dependency = $dependency;
    }

    public function sayHello()
    {
        echo $this->dependency->greeting();
    }
}