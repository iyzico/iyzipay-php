<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionCreateWithCustomerRequest;
use Iyzipay\Tests\TestCase;
use Iyzipay\Model\Locale;

class SubscriptionCreateWithCustomerRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();
        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("c1d489b6-9adc-42fa-88ae-47ea2e5dbe1e", $jsonObject["pricingPlanReferenceCode"]);
        $this->assertEquals("ACTIVE", $jsonObject["subscriptionInitialStatus"]);
        $this->assertEquals("1aa8d2ce-8209-4666-8bf5-b818e851c590", $jsonObject["customerReferenceCode"]);
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();
        $json = '{
                  "conversationId": "123456789",
                  "locale": "tr",
                  "pricingPlanReferenceCode": "c1d489b6-9adc-42fa-88ae-47ea2e5dbe1e",
                  "subscriptionInitialStatus": "ACTIVE",
                  "customerReferenceCode": "1aa8d2ce-8209-4666-8bf5-b818e851c590"
                }';
        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new SubscriptionCreateWithCustomerRequest();
        $request->setLocale("tr");
        $request->setConversationId("123456789");
        $request->setPricingPlanReferenceCode("c1d489b6-9adc-42fa-88ae-47ea2e5dbe1e");
        $request->setSubscriptionInitialStatus("ACTIVE");
        $request->setCustomerReferenceCode("1aa8d2ce-8209-4666-8bf5-b818e851c590");
        return $request;
    }
}