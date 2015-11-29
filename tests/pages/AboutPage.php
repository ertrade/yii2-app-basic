<?php

namespace tests\pages;

use yii\codeception\BasePage;

/**
 * Represents about page.
 *
 * @property \TestLord|\WebLord $actor
 */
class AboutPage extends BasePage
{
    public $route = 'site/about';
}
