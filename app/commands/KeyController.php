<?php

namespace app\commands;

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
     */
    public function actionGenerate()
    {
        $key = static::getRandomString();

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
     * Generate a pseudo-random string of bytes.
     *
     * @return string
     *
     * @throw \yii\base\Exception
     */
    protected static function getRandomBytes($length)
    {
        if (!function_exists('openssl_random_pseudo_bytes')) {
            throw new Exception('OpenSSL extension is required.');
        }

        $bytes = openssl_random_pseudo_bytes($length, $strong);
        if (false === $bytes || false === $strong) {
            throw new Exception('Unable to generate random string.');
        }

        return $bytes;
    }

    /**
     * Generate a pseudo-random alpha-numeric string.
     *
     * @return string
     */
    protected static function getRandomString($length = 32)
    {
        $str = '';

        while (($len = strlen($str)) < $length) {
            $size = $length - $len;
            $data = base64_encode(static::getRandomBytes($size));

            $str .= substr(str_replace(['+', '/', '='], '', $data), 0, $size);
        }

        return $str;
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
