<?php

namespace Iyzipay\Tests\Model\Subscription;

use Iyzipay\Model\Subscription\SubscriptionUpgrade;
use Iyzipay\Request\Subscription\SubscriptionUpgradeRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class SubscriptionUpgradeTest extends IyzipayResourceTestCase
{
    public function test_should_upgrade_subscription()
    {
        $this->expectHttpPost();
        $upgrade = SubscriptionUpgrade::update(new SubscriptionUpgradeRequest(), $this->options);
        $this->verifyResource($upgrade);
    }
}