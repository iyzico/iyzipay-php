<?php

namespace Iyzipay\Tests\Model\Subscription;

use Iyzipay\Model\Subscription\SubscriptionDetails;
use Iyzipay\Request\Subscription\SubscriptionDetailsRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class SubscriptionDetailsTest extends IyzipayResourceTestCase
{
    public function test_should_retrieve_subscription_details()
    {
        $this->expectHttpGetV2();
        $subscriptionDetails = SubscriptionDetails::retrieve(new SubscriptionDetailsRequest(), $this->options);
        $this->verifyResource($subscriptionDetails);
    }
}