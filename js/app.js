'use strict';

(function () {
    new Router([
        new Route('laravel/view', 'brands/laravel/view/0_fulli/index', true),
        new Route('laravel/validation', 'brands/laravel/validation/0_fulli/index'),
        new Route('laravel/container', 'brands/laravel/container/0_fulli/index'),
        new Route('about', 'about.html')
    ]);
}());
