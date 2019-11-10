<?php

namespace Iyzipay\Tests\Model\Subscription;

use Iyzipay\Model\Subscription\SubscriptionCreateCheckoutForm;
use Iyzipay\Request\Subscription\SubscriptionCreateCheckoutFormRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class SubscriptionCreateCheckoutFormTest extends IyzipayResourceTestCase
{
    public function test_should_create_subscription_checkout_form()
    {
        $this->expectHttpPost();
        $subscriptionForm = SubscriptionCreateCheckoutForm::create(new SubscriptionCreateCheckoutFormRequest(), $this->options);
        $this->verifyResource($subscriptionForm);
    }
}