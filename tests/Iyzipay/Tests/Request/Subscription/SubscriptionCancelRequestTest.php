<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionCancelRequest;
use Iyzipay\Tests\TestCase;
use Iyzipay\Model\Locale;

class SubscriptionCancelRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();
        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("0a209163-7c84-4409-9a5b-f4419b2d7810", $jsonObject["subscriptionReferenceCode"]);
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();
        $json = '{
                  "conversationId": "123456789",
                  "locale": "tr",
                  "subscriptionReferenceCode": "0a209163-7c84-4409-9a5b-f4419b2d7810"
                }';
        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new SubscriptionCancelRequest();
        $request->setLocale("tr");
        $request->setConversationId("123456789");
        $request->setSubscriptionReferenceCode("0a209163-7c84-4409-9a5b-f4419b2d7810");
        return $request;
    }
}
