<?php

/**
 * @method void am($role)
 * @method void amGoingTo($argumentation)
 * @method void comment($description)
 * @method void execute($callable)
 * @method void expect($prediction)
 * @method void expectTo($prediction)
 * @method void lookForwardTo($achieveValue)
 * @method void wantTo($text)
 * @method void wantToTest($text)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 */
class WebLord extends Codeception\Actor
{
    use _generated\WebLordActions;
}
