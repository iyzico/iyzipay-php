<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionUpgradeRequest;
use Iyzipay\Tests\TestCase;
use Iyzipay\Model\Locale;

class SubscriptionUpgradeRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();
        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("5308630d-fb0a-453f-b30a-5afa719d5191", $jsonObject["newPricingPlanReferenceCode"]);
        $this->assertEquals("85eaa655-c3fd-4053-9e9b-dacc9e201c5f", $jsonObject["subscriptionReferenceCode"]);
        $this->assertEquals("NOW", $jsonObject["upgradePeriod"]);
        $this->assertEquals(true, $jsonObject["useTrial"]);
        $this->assertEquals(true, $jsonObject["resetRecurrenceCount"]);


    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();
        $json = '{
                  "conversationId": "123456789",
                  "locale": "tr",
                  "newPricingPlanReferenceCode": "5308630d-fb0a-453f-b30a-5afa719d5191",
                  "subscriptionReferenceCode": "85eaa655-c3fd-4053-9e9b-dacc9e201c5f",
                  "upgradePeriod": "NOW",
                  "useTrial": '.$request->getUseTrial().',
                  "resetRecurrenceCount": '.$request->getResetRecurrenceCount().'
                }';
        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new SubscriptionUpgradeRequest();
        $request->setLocale("tr");
        $request->setConversationId("123456789");
        $request->setSubscriptionReferenceCode("85eaa655-c3fd-4053-9e9b-dacc9e201c5f");
        $request->setNewPricingPlanReferenceCode("5308630d-fb0a-453f-b30a-5afa719d5191");
        $request->setUpgradePeriod("NOW");
        $request->setUseTrial(true);
        $request->setResetRecurrenceCount(true);
        return $request;
    }
}
