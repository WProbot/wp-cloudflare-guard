<?php

declare(strict_types=1);

namespace TypistTech\WPCFG;

use Codeception\Actor;

/**
 * Inherited Methods
 *
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = null)
 *
 * @SuppressWarnings(PHPMD)
 */
class FunctionalTester extends Actor
{
    use _generated\FunctionalTesterActions;

    public function amOnWPCFGSettingPage()
    {
        $this->amOnAdminPage('/admin.php?page=wpcfg-cloudflare');
    }

    public function loginToWPCFGSettingPage()
    {
        $this->loginAsAdmin();
        $this->amOnAdminPage('/admin.php?page=wpcfg-cloudflare');
    }
}
