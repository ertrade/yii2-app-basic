<?php

namespace app\commands;

use Yii;
use yii\base\Exception;
use yii\console\Controller;
use yii\helpers\Console;

/**
 * Set cookie validation key.
 */
class KeyController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public $defaultAction = 'generate';

    /**
     * Set cookie validation key.
     *
     * @param int $length Key length
     */
    public function actionGenerate($length = 32)
    {
        $key = Yii::$app->getSecurity()->generateRandomString($length);

        $files = glob(PROJECT_PATH.'/{.env,.*.env}', GLOB_BRACE);
        foreach ($files as $file) {
            static::replaceKey($file, $key);
        }

        $this->stdout(
            'Cookie validation key set succesfully.'.PHP_EOL,
            Console::FG_GREEN
        );
    }

    /**
     * Replace old cookie validation key in configuration with the new value.
     *
     * @param string $file
     * @param string $key
     */
    protected static function replaceKey($file, $key)
    {
        $data = preg_replace(
            '/(?<=COOKIE_VALIDATION_KEY=)(?:([\'"]).*\1|\S*)/',
            '"'.$key.'"',
            file_get_contents($file)
        );

        file_put_contents($file, $data);
    }
}
