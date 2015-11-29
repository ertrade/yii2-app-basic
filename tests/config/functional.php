<?php
// Application configuration for functional tests.

$_SERVER['SCRIPT_FILENAME'] = YII_TEST_ENTRY_FILE;
$_SERVER['SCRIPT_NAME'] = YII_TEST_ENTRY_URL;

return yii\helpers\ArrayHelper::merge(
    require(PROJECT_PATH.'/app/config/web.php'),
    require(__DIR__.'/config.php'),
    [
        'components' => [
            'request' => [
                // It's not recommended to run functional tests with CSRF
                // validation enabled.
                'enableCsrfValidation' => false,
            ],
        ],
    ]
);
