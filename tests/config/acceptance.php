<?php
// Application configuration for acceptance tests.

return yii\helpers\ArrayHelper::merge(
    require(PROJECT_PATH.'/app/config/web.php'),
    require(__DIR__.'/config.php')
);
