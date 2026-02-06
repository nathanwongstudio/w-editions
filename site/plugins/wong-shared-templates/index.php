<?php

use Kirby\Cms\App as Kirby;

Kirby::plugin('itsallwong/w-editions-shared-templates', [
    'templates' => [
        'error' => __DIR__ . '/templates/home.php',
        'home' => __DIR__ . '/templates/home.php',
    ]
]);