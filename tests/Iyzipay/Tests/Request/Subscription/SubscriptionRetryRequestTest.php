<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionRetryRequest;
use Iyzipay\Tests\TestCase;
use Iyzipay\Model\Locale;

class SubscriptionRetryRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();
        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("504de1a8-8588-485e-9f8d-9bd9f3cb52f2", $jsonObject["referenceCode"]);;

    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();
        $json = '{
                  "conversationId": "123456789",
                  "locale": "tr",
                  "referenceCode": "504de1a8-8588-485e-9f8d-9bd9f3cb52f2"
                }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new SubscriptionRetryRequest();
        $request->setLocale("tr");
        $request->setConversationId("123456789");
        $request->setReferenceCode("504de1a8-8588-485e-9f8d-9bd9f3cb52f2");
        return $request;
    }
}
