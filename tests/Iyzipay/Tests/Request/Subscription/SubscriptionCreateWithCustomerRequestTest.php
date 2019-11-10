<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionCreateWithCustomerRequest;
use Iyzipay\Tests\TestCase;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Customer;

class SubscriptionCreateWithCustomerRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();
        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("7ad4cc50-c96c-45c6-a3f3-5f1db261e511", $jsonObject["customerReferenceCode"]);;
        $this->assertEquals("ffed3cb1-1cf6-476f-9a0c-ae2a89e2cc1d", $jsonObject["pricingPlanReferenceCode"]);


    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();
        $json = '{
                  "conversationId": "123456789",
                  "customerReferenceCode": "7ad4cc50-c96c-45c6-a3f3-5f1db261e511",
                  "locale": "tr",
                  "pricingPlanReferenceCode": "ffed3cb1-1cf6-476f-9a0c-ae2a89e2cc1d"
                }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new SubscriptionCreateWithCustomerRequest();
        $request->setLocale("tr");
        $request->setConversationId("123456789");
        $request->setPricingPlanReferenceCode("ffed3cb1-1cf6-476f-9a0c-ae2a89e2cc1d");
        $request->setCustomerReferenceCode("7ad4cc50-c96c-45c6-a3f3-5f1db261e511");
        return $request;
    }
}
