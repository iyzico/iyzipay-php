<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Locale;
use Iyzipay\Request\CreateCancelRequest;
use Iyzipay\Tests\TestCase;

class CreateCancelRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = new CreateCancelRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentId("1");
        $request->setIp("85.34.78.112");

        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("1", $jsonObject["paymentId"]);
        $this->assertEquals("85.34.78.112", $jsonObject["ip"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = new CreateCancelRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentId("1");
        $request->setIp("85.34.78.112");

        $str = "[locale=tr," .
            "conversationId=123456789," .
            "paymentId=1," .
            "ip=85.34.78.112]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = new CreateCancelRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentId("1");
        $request->setIp("85.34.78.112");

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456789",
                "paymentId":"1",
                "ip":"85.34.78.112"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }
}
