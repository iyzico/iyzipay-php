<?php

namespace Iyzipay\Tests\Model\Subscription;

use Iyzipay\Model\Subscription\SubscriptionCardUpdate;
use Iyzipay\Request\Subscription\SubscriptionCardUpdateRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class SubscriptionCardUpdateTest extends IyzipayResourceTestCase
{
    public function test_should_update_subscription_customer_card()
    {
        $this->expectHttpPost();
        $cardUpdate = SubscriptionCardUpdate::update(new SubscriptionCardUpdateRequest(), $this->options);
        $this->verifyResource($cardUpdate);
    }
}