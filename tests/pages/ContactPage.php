<?php

namespace tests\pages;

use yii\codeception\BasePage;

/**
 * Represents contact page.
 *
 * @property \TestLord|\WebLord $actor
 */
class ContactPage extends BasePage
{
    public $route = 'site/contact';

    /**
     * @param array $data
     */
    public function submit(array $data)
    {
        foreach ($data as $field => $value) {
            $this->actor->fillField('[name="ContactForm['.$field.']"]', $value);
        }

        $this->actor->click('contact-button');
    }
}
