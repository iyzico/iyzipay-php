<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionCardUpdateWithSubscriptionReferenceCodeRequest;
use Iyzipay\Tests\TestCase;
use Iyzipay\Model\Locale;

class SubscriptionCardUpdateWithSubscriptionReferenceCodeRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();
        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("7ad4cc50-c96c-45c6-a3f3-5f1db261e511", $jsonObject["subscriptionReferenceCode"]);;
        $this->assertEquals("https://www.callbackurl.com", $jsonObject["callbackUrl"]);
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();
        $json = '{
                  "callbackUrl": "https://www.callbackurl.com",
                  "conversationId": "123456789",
                  "subscriptionReferenceCode": "7ad4cc50-c96c-45c6-a3f3-5f1db261e511",
                  "locale": "tr"
                }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new SubscriptionCardUpdateWithSubscriptionReferenceCodeRequest();
        $request->setLocale("tr");
        $request->setConversationId("123456789");
        $request->setSubscriptionReferenceCode("7ad4cc50-c96c-45c6-a3f3-5f1db261e511");
        $request->setCallBackUrl("https://www.callbackurl.com");
        return $request;
    }
}
