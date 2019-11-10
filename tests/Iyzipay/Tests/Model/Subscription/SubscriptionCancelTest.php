<?php

namespace Iyzipay\Tests\Model\Subscription;

use Iyzipay\Model\Subscription\SubscriptionCancel;
use Iyzipay\Request\Subscription\SubscriptionCancelRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class SubscriptionCancelTest extends IyzipayResourceTestCase
{
    public function test_should_cancel_subscription()
    {
        $this->expectHttpPost();
        $cancel = SubscriptionCancel::cancel(new SubscriptionCancelRequest(), $this->options);
        $this->verifyResource($cancel);
    }
}