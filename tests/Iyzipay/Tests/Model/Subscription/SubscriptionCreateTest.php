<?php

namespace Iyzipay\Tests\Model\Subscription;

use Iyzipay\Model\Subscription\SubscriptionCreate;
use Iyzipay\Request\Subscription\SubscriptionCreateRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class SubscriptionCreateTest extends IyzipayResourceTestCase
{
    public function test_should_create_subscription()
    {
        $this->expectHttpPost();
        $subscription = SubscriptionCreate::create(new SubscriptionCreateRequest(), $this->options);
        $this->verifyResource($subscription);
    }
}