<?php

namespace Iyzipay\Tests\Model\Subscription;

use Iyzipay\Model\Subscription\SubscriptionCreateWithCustomer;
use Iyzipay\Request\Subscription\SubscriptionCreateWithCustomerRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class SubscriptionCreateWithCustomerTest extends IyzipayResourceTestCase
{
    public function test_should_create_subscription_with_customer_reference()
    {
        $this->expectHttpPost();
        $subscription = SubscriptionCreateWithCustomer::create(new SubscriptionCreateWithCustomerRequest(), $this->options);
        $this->verifyResource($subscription);
    }
}