<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionUpdatePricingPlanRequest;
use Iyzipay\Tests\TestCase;
use Iyzipay\Model\Locale;

class SubscriptionUpdatePricingPlanRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();
        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("UpdatedNameOfPricingPlan", $jsonObject["name"]);
        $this->assertEquals("ac188383-d30e-490e-94bb-239ff6af4b5b", $jsonObject["pricingPlanReferenceCode"]);
        $this->assertEquals("30", $jsonObject["trialPeriodDays"]);
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();
        $json = '{
                      "conversationId": "123456789",
                      "locale": "tr",
                      "name": "UpdatedNameOfPricingPlan",
                      "pricingPlanReferenceCode": "ac188383-d30e-490e-94bb-239ff6af4b5b",
                      "trialPeriodDays": 30
                }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new SubscriptionUpdatePricingPlanRequest();
        $request->setLocale('tr');
        $request->setConversationId('123456789');
        $request->setPricingPlanReferenceCode('ac188383-d30e-490e-94bb-239ff6af4b5b');
        $request->setName('UpdatedNameOfPricingPlan');
        $request->setTrialPeriodDays(30);
        return $request;
    }
}
