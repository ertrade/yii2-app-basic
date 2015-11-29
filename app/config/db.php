<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => env('DB_DSN', 'mysql:host=localhost;dbname=dbmain'),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', ''),
    'charset' => 'utf8',
];
