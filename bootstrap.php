<?php

define('PROJECT_PATH', __DIR__);

require PROJECT_PATH.'/app/helpers.php';
require PROJECT_PATH.'/vendor/autoload.php';

if (!defined('YII_ENV') && ($env = env('YII_ENV')) !== null) {
    define('YII_ENV', $env);
}

try {
    if (defined('YII_ENV')) {
        (new Dotenv\Dotenv(PROJECT_PATH, '.'.YII_ENV.'.env'))->load();
    } else {
        (new Dotenv\Dotenv(PROJECT_PATH))->load();
        define('YII_ENV', env('YII_ENV', 'prod'));
    }
} catch (InvalidArgumentException $e) {
    // Let it be.
}

define('YII_DEBUG', env('YII_DEBUG', false));

require PROJECT_PATH.'/vendor/yiisoft/yii2/Yii.php';
