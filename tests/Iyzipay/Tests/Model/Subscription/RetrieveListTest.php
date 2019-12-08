<?php

namespace Iyzipay\Tests\Model\Subscription;

use Iyzipay\Request\Subscription\SubscriptionListProductsRequest;
use Iyzipay\Request\Subscription\SubscriptionListPricingPlanRequest;
use Iyzipay\Request\Subscription\SubscriptionListCustomersRequest;
use Iyzipay\Request\Subscription\SubscriptionSearchRequest;
use Iyzipay\Model\Subscription\RetrieveList;
use Iyzipay\Tests\IyzipayResourceTestCase;

class RetrieveListTest extends IyzipayResourceTestCase
{
    public function test_should_retrieve_products()
    {
        $this->expectHttpGetV2();
        $products = RetrieveList::products(new SubscriptionListProductsRequest(), $this->options);
        $this->verifyResource($products);
    }
    public function test_should_retrieve_pricing_plans()
    {
        $this->expectHttpGetV2();
        $plans = RetrieveList::pricingPlan(new SubscriptionListPricingPlanRequest(), $this->options);
        $this->verifyResource($plans);
    }
    public function test_should_retrieve_customers()
    {
        $this->expectHttpGetV2();
        $customers = RetrieveList::customers(new SubscriptionListCustomersRequest(), $this->options);
        $this->verifyResource($customers);
    }
    public function test_should_retrieve_subscriptions()
    {
        $this->expectHttpGetV2();
        $subscriptions = RetrieveList::subscriptions(new SubscriptionSearchRequest(), $this->options);
        $this->verifyResource($subscriptions);
    }
}