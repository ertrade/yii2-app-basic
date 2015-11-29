<?php

use tests\pages\AboutPage;

$I = new WebLord($scenario);
$I->wantTo('ensure that about works');
AboutPage::openBy($I);
$I->see('About', 'h1');
