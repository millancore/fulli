<?php

$validator =  require_once __DIR__ .DIRECTORY_SEPARATOR. 'bootstrap.php';

$rules = [
    'email' => 'required|email|max:55'
];

$validator = $validator->make(
    ['email' => 'test@validation,com'],
    $rules
);

