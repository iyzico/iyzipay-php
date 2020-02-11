<?php

namespace Iyzipay\Tests\Model\Subscription;

use Iyzipay\Model\Subscription\SubscriptionCardUpdate;
use Iyzipay\Request\Subscription\SubscriptionCardUpdateRequest;
use Iyzipay\Request\Subscription\SubscriptionCardUpdateWithSubscriptionReferenceCodeRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class SubscriptionCardUpdateTest extends IyzipayResourceTestCase
{
    public function test_should_update_subscription_customer_card()
    {
        $this->expectHttpPost();
        $cardUpdate = SubscriptionCardUpdate::update(new SubscriptionCardUpdateRequest(), $this->options);
        $this->verifyResource($cardUpdate);
    }

    public function test_should_update_card_with_subscription_reference_code()
    {
        $this->expectHttpPost();
        $cardUpdate = SubscriptionCardUpdate::updateWithSubscriptionReferenceCode(new SubscriptionCardUpdateWithSubscriptionReferenceCodeRequest(), $this->options);
        $this->verifyResource($cardUpdate);
    }
}