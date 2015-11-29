<?php

namespace app\commands;

use yii\console\Controller;
use yii\helpers\Console;

/**
 * Display an inspiring quote.
 *
 * Taken from (and inspired by) Laravel.
 */
class InspireController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public $defaultAction = 'inspire';
    /**
     * @var string[]
     */
    public $quotes = [
        'He who is contented is rich. - Laozi',
        'Simplicity is an acquired taste. - Katharine Gerould',
        'Simplicity is the essence of happiness. - Cedric Bledsoe',
        'Simplicity is the ultimate sophistication. - Leonardo da Vinci',
        'Smile, breathe, and go slowly. - Thich Nhat Hanh',
        'Very little is needed to make a happy life. - Marcus Antoninus',
        'Well begun is half done. - Aristotle',
        'When there is no desire, all things are at peace. - Laozi',
    ];

    /**
     * Display an inspiring quote.
     */
    public function actionInspire()
    {
        $this->stdout(PHP_EOL);
        $this->stdout($this->getRandomQuote().PHP_EOL, Console::FG_YELLOW);
        $this->stdout(PHP_EOL);
    }

    /**
     * @return string
     */
    protected function getRandomQuote()
    {
        return $this->quotes[array_rand($this->quotes)];
    }
}
