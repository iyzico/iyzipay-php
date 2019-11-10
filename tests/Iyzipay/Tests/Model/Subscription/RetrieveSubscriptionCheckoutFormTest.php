<?php

namespace Iyzipay\Tests\Model\Subscription;

use Iyzipay\Model\Subscription\RetrieveSubscriptionCheckoutForm;
use Iyzipay\Request\Subscription\RetrieveSubscriptionCreateCheckoutFormRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class RetrieveSubscriptionCheckoutFormTest extends IyzipayResourceTestCase
{
    public function test_should_retrieve_subscriptions()
    {
        $this->expectHttpGetV2();
        $subscriptionForm = RetrieveSubscriptionCheckoutForm::retrieve(new RetrieveSubscriptionCreateCheckoutFormRequest(), $this->options);
        $this->verifyResource($subscriptionForm);
    }
}