<?php

require_once __DIR__ . 'bootstrap.php';

print view('default', [
    'greetings' => 'Hello Illuminate View!'
]);

