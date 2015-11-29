<?php

$db = require __DIR__.'/db.php';
$params = require __DIR__.'/params.php';

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'aliases' => [
        '@tests' => PROJECT_PATH.'/tests',
    ],
    'bootstrap' => ['log'],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => $db,
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    'controllerNamespace' => 'app\commands',
    'params' => $params,
    'vendorPath' => PROJECT_PATH.'/vendor',
];

return $config;
