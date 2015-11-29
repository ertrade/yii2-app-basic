<?php

namespace app\widgets;

use yii\captcha\Captcha;

class CaptchaRow extends Captcha
{
    public $template = <<<'HTML'
<div class="row">
    <div class="col-lg-3">{image}</div>
    <div class="col-lg-6">{input}</div>
</div>
HTML;
}
