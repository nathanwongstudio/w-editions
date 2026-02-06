<?php
return [
    'transport' => [
        'type' => 'smtp',
        'port' => 465,
        'security' => true,
        'host' => 'smtp.mailgun.org',
        'auth' => true,
        'username' => env('MAILGUN_EMAIL'),
        'password' => env('MAILGUN_API_KEY'),
    ],
];
