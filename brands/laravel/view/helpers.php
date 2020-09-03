<?php

use Illuminate\Container\Container;

if (! function_exists('view')) {
    function view($view = null, $data = [], $mergeData = [])
    {
        $factory = Container::getInstance()->make('view');

        if (func_num_args() === 0) {
            return $factory;
        }

        return $factory->make($view, $data, $mergeData);
    }
}
