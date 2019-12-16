<?php

namespace Iyzipay\Tests\Model\Mapper\Subscription;

use Iyzipay\Model\Mapper\Subscription\RetrieveListResourceMapper;
use Iyzipay\Model\Subscription\RetrieveList;
use Iyzipay\Tests\TestCase;

class RetrieveListResourceMapperTest extends TestCase
{
    public function test_should_map_subscription_list_products()
    {
        $json = $this->retrieveJsonFile("product_list.json");
        $products = RetrieveListResourceMapper::create($json)->jsonDecode()->mapRetrieveList(new RetrieveList());

        $this->assertNotEmpty($products);
        $this->assertEquals("1", $products->getCurrentPage());
        $this->assertEquals("3", $products->getPageCount());
        $this->assertEquals("29", $products->getTotalCount());
        $this->assertEquals( array(), $products->getItems());
        $this->assertEquals("success", $products->getStatus());
        $this->assertEquals(null, $products->getErrorCode());
        $this->assertEquals(null, $products->getErrorMessage());
        $this->assertEquals(null, $products->getErrorGroup());
        $this->assertEquals("1571531891298", $products->getSystemTime());
        $this->assertJson($products->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $products->getRawResult());
    }
    public function test_should_map_subscription_list_pricing_plans()
    {
        $json = $this->retrieveJsonFile("pricing_plan_list.json");
        $pricingPlans = RetrieveListResourceMapper::create($json)->jsonDecode()->mapRetrieveList(new RetrieveList());

        $this->assertNotEmpty($pricingPlans);
        $this->assertEquals("1", $pricingPlans->getCurrentPage());
        $this->assertEquals("0", $pricingPlans->getPageCount());
        $this->assertEquals("0", $pricingPlans->getTotalCount());
        $this->assertEquals( array(), $pricingPlans->getItems());
        $this->assertEquals("success", $pricingPlans->getStatus());
        $this->assertEquals(null, $pricingPlans->getErrorCode());
        $this->assertEquals(null, $pricingPlans->getErrorMessage());
        $this->assertEquals(null, $pricingPlans->getErrorGroup());
        $this->assertEquals("1573319173528", $pricingPlans->getSystemTime());
        $this->assertJson($pricingPlans->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $pricingPlans->getRawResult());

    }

    public function test_should_map_subscription_list_customers()
    {
        $json = $this->retrieveJsonFile("customer_list.json");
        $customers = RetrieveListResourceMapper::create($json)->jsonDecode()->mapRetrieveList(new RetrieveList());

        $this->assertNotEmpty($customers);
        $this->assertEquals("1", $customers->getCurrentPage());
        $this->assertEquals("161", $customers->getPageCount());
        $this->assertEquals("161", $customers->getTotalCount());
        $this->assertEquals( array(), $customers->getItems());
        $this->assertEquals("success", $customers->getStatus());
        $this->assertEquals(null, $customers->getErrorCode());
        $this->assertEquals(null, $customers->getErrorMessage());
        $this->assertEquals(null, $customers->getErrorGroup());
        $this->assertEquals("1573394708749", $customers->getSystemTime());
        $this->assertJson($customers->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $customers->getRawResult());

    }

    public function test_should_map_subscription_list_subscriptions()
    {
        $json = $this->retrieveJsonFile("subscription_list.json");
        $subscriptions = RetrieveListResourceMapper::create($json)->jsonDecode()->mapRetrieveList(new RetrieveList());

        $this->assertNotEmpty($subscriptions);
        $this->assertEquals("1", $subscriptions->getCurrentPage());
        $this->assertEquals("0", $subscriptions->getPageCount());
        $this->assertEquals("0", $subscriptions->getTotalCount());
        $this->assertEquals( array(), $subscriptions->getItems());
        $this->assertEquals("success", $subscriptions->getStatus());
        $this->assertEquals(null, $subscriptions->getErrorCode());
        $this->assertEquals(null, $subscriptions->getErrorMessage());
        $this->assertEquals(null, $subscriptions->getErrorGroup());
        $this->assertEquals("1573394311422", $subscriptions->getSystemTime());
        $this->assertJson($subscriptions->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $subscriptions->getRawResult());

    }
}