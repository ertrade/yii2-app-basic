<?php

namespace app\commands;

use yii\console\Controller;
use yii\helpers\Console;

/**
 * Display the current environment.
 */
class EnvController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public $defaultAction = 'env';

    /**
     * Display the current environment.
     */
    public function actionEnv()
    {
        $this->stdout('Current application environment: ', Console::FG_GREEN);
        $this->stdout(YII_ENV.PHP_EOL, Console::FG_YELLOW);
    }
}
