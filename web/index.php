<?php

require __DIR__.'/../bootstrap.php';

$config = require PROJECT_PATH.'/app/config/web.php';

(new yii\web\Application($config))->run();
