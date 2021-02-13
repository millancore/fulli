<?php

require_once 'vendor/autoload.php';

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation;

$fileLoader = new FileLoader(
    new Filesystem, __DIR__ . DIRECTORY_SEPARATOR. 'lang'
);

# Locale resolver here
$localeLang = 'en';

return $validator = new Validation\Factory(
    new Translator($fileLoader, $localeLang)
);