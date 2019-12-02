<?php

namespace Iyzipay\Tests\Model\Subscription;

use Iyzipay\Model\Subscription\SubscriptionCustomer;
use Iyzipay\Request\Subscription\SubscriptionCreateCustomerRequest;
use Iyzipay\Request\Subscription\SubscriptionUpdateCustomerRequest;
use Iyzipay\Request\Subscription\SubscriptionRetrieveCustomerRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class SubscriptionCustomerTest extends IyzipayResourceTestCase
{
    public function test_should_subscription_customer()
    {
        $this->expectHttpPost();
        $customer = SubscriptionCustomer::create(new SubscriptionCreateCustomerRequest(), $this->options);
        $this->verifyResource($customer);
    }
    public function test_should_subscription_update_customer()
    {
        $this->expectHttpPost();
        $customer = SubscriptionCustomer::update(new SubscriptionUpdateCustomerRequest(), $this->options);
        $this->verifyResource($customer);
    }
    public function test_should_subscription_retrieve_customer()
    {
        $this->expectHttpGetV2();
        $customer = SubscriptionCustomer::retrieve(new SubscriptionRetrieveCustomerRequest(), $this->options);
        $this->verifyResource($customer);
    }
}