<?php

namespace Iyzipay\Tests\Model\Subscription;

use Iyzipay\Model\Subscription\SubscriptionActivate;
use Iyzipay\Request\Subscription\SubscriptionActivateRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class SubscriptionActivateTest extends IyzipayResourceTestCase
{
    public function test_should_activate_subscription()
    {
        $this->expectHttpPost();
        $subscriptionActivate = SubscriptionActivate::update(new SubscriptionActivateRequest(), $this->options);
        $this->verifyResource($subscriptionActivate);
    }
}