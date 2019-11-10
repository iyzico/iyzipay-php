<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionCreateProductRequest;
use Iyzipay\Tests\TestCase;
use Iyzipay\Model\Locale;

class SubscriptionCreateProductRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();
        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("NameOfProduct", $jsonObject["name"]);
        $this->assertEquals("DescriptionOfProduct", $jsonObject["description"]);
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();
        $json = '
                {
                    "locale":"tr",
                    "conversationId":"123456789",
                    "name":"NameOfProduct",
                    "description":"DescriptionOfProduct"
                }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new SubscriptionCreateProductRequest();
        $request->setLocale("tr");
        $request->setConversationId("123456789");
        $request->setName("NameOfProduct");
        $request->setDescription("DescriptionOfProduct");
        return $request;
    }
}
