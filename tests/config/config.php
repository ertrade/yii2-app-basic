<?php
// Application configuration shared by all test suites.

return [
    'components' => [
        'db' => [
            'dsn' => env('DB_DSN', 'mysql:host=localhost;dbname=dbtest'),
        ],
        'mailer' => [
            'useFileTransport' => true,
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
    ],
];
