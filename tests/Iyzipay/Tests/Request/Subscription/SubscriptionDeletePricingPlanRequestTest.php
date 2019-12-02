<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionDeletePricingPlanRequest;
use Iyzipay\Tests\TestCase;
use Iyzipay\Model\Locale;

class SubscriptionDeletePricingPlanRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();
        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("ac188383-d30e-490e-94bb-239ff6af4b5b", $jsonObject["pricingPlanReferenceCode"]);
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();
        $json = '{
                      "conversationId": "123456789",
                      "locale": "tr",
                      "pricingPlanReferenceCode": "ac188383-d30e-490e-94bb-239ff6af4b5b"
                 }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new SubscriptionDeletePricingPlanRequest();
        $request->setLocale('tr');
        $request->setConversationId('123456789');
        $request->setPricingPlanReferenceCode('ac188383-d30e-490e-94bb-239ff6af4b5b');
        return $request;
    }
}
