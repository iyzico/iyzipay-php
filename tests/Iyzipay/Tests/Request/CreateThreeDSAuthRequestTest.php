<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Locale;
use Iyzipay\Request\CreateThreeDSAuthRequest;
use Iyzipay\Tests\TestCase;

class CreateThreeDSAuthRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = new CreateThreeDSAuthRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentId("1");
        $request->setConversationData("conversation data");

        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("1", $jsonObject["paymentId"]);
        $this->assertEquals("conversation data", $jsonObject["conversationData"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = new CreateThreeDSAuthRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentId("1");
        $request->setConversationData("conversation data");

        $str = "[locale=tr," .
            "conversationId=123456789," .
            "paymentId=1," .
            "conversationData=conversation data]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = new CreateThreeDSAuthRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentId("1");
        $request->setConversationData("conversation data");

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456789",
                "paymentId":"1",
                "conversationData":"conversation data"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }
}