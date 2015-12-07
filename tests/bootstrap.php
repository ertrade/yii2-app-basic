<?php

$config = Codeception\Configuration::config()['config'];

putenv('ENV_FILE='.$config['environment_file']);
require __DIR__.'/../bootstrap.php';

$url = parse_url($config['test_entry_url']);
$file = PROJECT_PATH.'/'.$config['test_entry_file'];

define('YII_TEST_ENTRY_FILE', $file);
define('YII_TEST_ENTRY_URL', $url['path']);

Yii::setAlias('@tests', __DIR__);

$_SERVER['SCRIPT_FILENAME'] = YII_TEST_ENTRY_FILE;
$_SERVER['SCRIPT_NAME'] = YII_TEST_ENTRY_URL;
$_SERVER['SERVER_NAME'] = $url['host'];
$_SERVER['SERVER_PORT'] = (string) ($url['port'] ?: 80);
