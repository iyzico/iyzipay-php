<?php

namespace Iyzipay\Tests\Model\Subscription;

use Iyzipay\Model\Subscription\SubscriptionRetry;
use Iyzipay\Request\Subscription\SubscriptionRetryRequest;

use Iyzipay\Tests\IyzipayResourceTestCase;

class SubscriptionRetryTest extends IyzipayResourceTestCase
{
    public function test_should_retry_subscription_failed_payment()
    {
        $this->expectHttpPost();
        $retry = SubscriptionRetry::update(new SubscriptionRetryRequest(), $this->options);
        $this->verifyResource($retry);
    }
}