<?php

// Make sure this file is not accessible when deployed to production.
if (!in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'])) {
    exit('You are not allowed to access this file.');
}

define('YII_ENV', 'test');
require __DIR__.'/../bootstrap.php';

$config = require PROJECT_PATH.'/tests/config/acceptance.php';

(new yii\web\Application($config))->run();
