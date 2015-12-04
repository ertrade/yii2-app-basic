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
        'serve' => [
            'class' => 'yii\console\controllers\ServeController',
            'docroot' => PROJECT_PATH.'/web',
        ],
    ],
    'controllerNamespace' => 'app\commands',
    'params' => $params,
    'vendorPath' => PROJECT_PATH.'/vendor',
];

return $config;
