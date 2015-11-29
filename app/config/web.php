<?php

$db = require __DIR__.'/db.php';
$params = require __DIR__.'/params.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => $db,
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => env('MAILER_FILE_TRANSPORT', false),
        ],
        'request' => [
            'cookieValidationKey' => env('COOKIE_VALIDATION_KEY'),
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'view' => [
            'renderers' => [
                'twig' => [
                    'class' => 'yii\twig\ViewRenderer',
                    'extensions' => ['Twig_Extension_Debug'],
                    'globals' => [
                        'array' => 'yii\helpers\ArrayHelper',
                        'html' => 'yii\helpers\Html',
                        'yii' => 'Yii',
                    ],
                    'options' => [
                        'debug' => YII_DEBUG,
                    ],
                    'uses' => ['yii\bootstrap'],
                ],
            ],
        ],
    ],
    'params' => $params,
    'layout' => 'main.twig',
    'vendorPath' => PROJECT_PATH.'/vendor',
];

if (YII_ENV_DEV) {
    // Adjust configuration for 'dev' environment.
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];
}

return $config;
