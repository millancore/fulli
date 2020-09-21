<?php

namespace Fulli\Injection;

use Fulli\Contracts\DependencyInterface;

class Dependency implements DependencyInterface
{
    public function greeting()
    {
        return 'Hello Container!!';
    }
}
