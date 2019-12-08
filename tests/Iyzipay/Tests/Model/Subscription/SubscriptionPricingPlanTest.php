<?php

namespace Iyzipay\Tests\Model\Subscription;

use Iyzipay\Model\Subscription\SubscriptionPricingPlan;
use Iyzipay\Request\Subscription\SubscriptionCreatePricingPlanRequest;
use Iyzipay\Request\Subscription\SubscriptionUpdatePricingPlanRequest;
use Iyzipay\Request\Subscription\SubscriptionRetrievePricingPlanRequest;
use Iyzipay\Request\Subscription\SubscriptionDeletePricingPlanRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class SubscriptionPricingPlanTest extends IyzipayResourceTestCase
{
    public function test_should_subscription_pricing_plan()
    {
        $this->expectHttpPost();
        $pricingPlan = SubscriptionPricingPlan::create(new SubscriptionCreatePricingPlanRequest(), $this->options);
        $this->verifyResource($pricingPlan);
    }
    public function test_should_subscription_update_pricing_plan()
    {
        $this->expectHttpPost();
        $pricingPlan = SubscriptionPricingPlan::update(new SubscriptionUpdatePricingPlanRequest(), $this->options);
        $this->verifyResource($pricingPlan);
    }
    public function test_should_subscription_retrieve_pricing_plan()
    {
        $this->expectHttpGetV2();
        $pricingPlan = SubscriptionPricingPlan::retrieve(new SubscriptionRetrievePricingPlanRequest(), $this->options);
        $this->verifyResource($pricingPlan);
    }
    public function test_should_subscription_delete_pricing_plan()
    {
        $this->expectHttpDelete();
        $pricingPlan = SubscriptionPricingPlan::delete(new SubscriptionDeletePricingPlanRequest(), $this->options);
        $this->verifyResource($pricingPlan);
    }
}