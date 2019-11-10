<?php

namespace Iyzipay\Tests\Model\Mapper\Subscription;

use Iyzipay\Model\Mapper\Subscription\SubscriptionActionMapper;
use Iyzipay\Model\Subscription\SubscriptionActivate;
use Iyzipay\Model\Subscription\SubscriptionCancel;
use Iyzipay\Model\Subscription\SubscriptionRetry;
use Iyzipay\Model\Subscription\SubscriptionUpgrade;
use Iyzipay\Tests\TestCase;

class SubscriptionActionMapperTest extends TestCase
{
    public function test_should_map_subscription_activate_subscription_mapper()
    {
        $json = $this->retrieveJsonFile("subscription_items_actions.json");
        $activate = SubscriptionActionMapper::create($json)->jsonDecode()->mapSubscriptionAction(new SubscriptionActivate());

        $this->assertNotEmpty($activate);
        $this->assertEquals("success", $activate->getStatus());
        $this->assertEquals("1570890939630", $activate->getSystemTime());
        $this->assertJson($activate->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $activate->getRawResult());
    }
    public function test_should_map_subscription_cancel_subscription_mapper()
    {
        $json = $this->retrieveJsonFile("subscription_items_actions.json");
        $cancel = SubscriptionActionMapper::create($json)->jsonDecode()->mapSubscriptionAction(new SubscriptionCancel());

        $this->assertNotEmpty($cancel);
        $this->assertEquals("success", $cancel->getStatus());
        $this->assertEquals("1570890939630", $cancel->getSystemTime());
        $this->assertJson($cancel->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $cancel->getRawResult());
    }
    public function test_should_map_subscription_retry_subscription_mapper()
    {
        $json = $this->retrieveJsonFile("subscription_items_actions.json");
        $retry = SubscriptionActionMapper::create($json)->jsonDecode()->mapSubscriptionAction(new SubscriptionRetry());

        $this->assertNotEmpty($retry);
        $this->assertEquals("success", $retry->getStatus());
        $this->assertEquals("1570890939630", $retry->getSystemTime());
        $this->assertJson($retry->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $retry->getRawResult());
    }
    public function test_should_map_subscription_upgrade_subscription_mapper()
    {
        $json = $this->retrieveJsonFile("subscription_items_actions.json");
        $upgrade = SubscriptionActionMapper::create($json)->jsonDecode()->mapSubscriptionAction(new SubscriptionUpgrade());

        $this->assertNotEmpty($upgrade);
        $this->assertEquals("success", $upgrade->getStatus());
        $this->assertEquals("1570890939630", $upgrade->getSystemTime());
        $this->assertJson($upgrade->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $upgrade->getRawResult());
    }
}