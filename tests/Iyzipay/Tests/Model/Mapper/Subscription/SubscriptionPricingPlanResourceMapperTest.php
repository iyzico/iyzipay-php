<?php

namespace Iyzipay\Tests\Model\Mapper\Subscription;

use Iyzipay\Model\Mapper\Subscription\SubscriptionPricingPlanResourceMapper;
use Iyzipay\Model\Subscription\SubscriptionPricingPlan;
use Iyzipay\Tests\TestCase;

class SubscriptionPricingPlanResourceMapperTest extends TestCase
{
    public function test_should_map_subscription_pricing_plan_resource_mapper()
    {
        $json = $this->retrieveJsonFile("subscription_pricing_plan.json");
        $pricingPlan = SubscriptionPricingPlanResourceMapper::create($json)->jsonDecode()->mapSubscriptionPricingPlan(new SubscriptionPricingPlan());

        $this->assertNotEmpty($pricingPlan);
        $this->assertEquals("PricingPlanName", $pricingPlan->getName());
        $this->assertEquals("1573313525000", $pricingPlan->getCreatedDate());
        $this->assertEquals("TRY", $pricingPlan->getCurrencyCode());
        $this->assertEquals("ACTIVE", $pricingPlan->getPricingPlanStatus());
        $this->assertEquals("WEEKLY", $pricingPlan->getPaymentInterval());
        $this->assertEquals(1, $pricingPlan->getPaymentIntervalCount());
        $this->assertEquals("RECURRING", $pricingPlan->getPlanPaymentType());
        $this->assertEquals(30.00000000, $pricingPlan->getPrice());
        $this->assertEquals("ac188383-d30e-490e-94bb-239ff6af4b5b", $pricingPlan->getProductReferenceCode());
        $this->assertEquals("0984a3a9-d204-45e9-beb9-cab8fcdb6340", $pricingPlan->getReferenceCode());
        $this->assertEquals(5, $pricingPlan->getRecurrenceCount());
        $this->assertEquals(10, $pricingPlan->getTrialPeriodDays());
        $this->assertEquals("success", $pricingPlan->getStatus());
        $this->assertEquals("success", $pricingPlan->getStatus());
        $this->assertEquals(null, $pricingPlan->getErrorCode());
        $this->assertEquals(null, $pricingPlan->getErrorMessage());
        $this->assertEquals(null, $pricingPlan->getErrorGroup());
        $this->assertEquals("1573314451931", $pricingPlan->getSystemTime());
        $this->assertJson($pricingPlan->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $pricingPlan->getRawResult());
    }

    public function test_should_map_subscription_delete_pricing_plan()
    {
        $json = $this->retrieveJsonFile("subscription_items_actions.json");

        $delete = SubscriptionPricingPlanResourceMapper::create($json)->jsonDecode()->mapSubscriptionPricingPlan(new SubscriptionPricingPlan());

        $this->assertNotEmpty($delete);
        $this->assertEquals("success", $delete->getStatus());
        $this->assertEquals("1570890939630", $delete->getSystemTime());
        $this->assertJson($delete->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $delete->getRawResult());
    }
}