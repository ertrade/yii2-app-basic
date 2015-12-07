<?php

define('PROJECT_PATH', __DIR__);

require PROJECT_PATH.'/app/helpers.php';
require PROJECT_PATH.'/vendor/autoload.php';

$env = env('YII_ENV');

if ('prod' !== $env) {
    (new Dotenv\Dotenv(PROJECT_PATH, env('ENV_FILE', '.env')))->load();
}

define('YII_ENV', null !== $env ? $env : env('YII_ENV', 'prod'));
define('YII_DEBUG', env('YII_DEBUG', false));

require PROJECT_PATH.'/vendor/yiisoft/yii2/Yii.php';
