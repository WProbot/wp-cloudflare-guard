<?php

declare(strict_types=1);

use TypistTech\WPCFG\FunctionalTester;

$I = new FunctionalTester($scenario);
$I->wantToTest('review me notice after ten days');

$optionName = 'wrm_a87d157b6f87b8521211';
$I->amGoingTo('reset review me installed time');
$I->haveOptionInDatabase($optionName, 0);

$I->loginToWPCFGSettingPage();

$I->wantToTest('review me installed time is set within the past ten seconds');
$installed = $I->grabOptionFromDatabase($optionName);
$I->assertEquals(time(), $installed, null, 10);

$I->amGoingTo('fast forward ten days and one minute (864060 seconds)');
$I->haveOptionInDatabase($optionName, time() - 864060);

$I->amOnAdminPage('/options-general.php');
$I->seeLink(
    'Click here to leave your review',
    'https://wordpress.org/support/plugin/wp-cloudflare-guard/reviews?rate=5#new-post'
);
