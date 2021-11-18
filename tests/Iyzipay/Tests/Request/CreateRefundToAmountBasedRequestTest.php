<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Locale;
use Iyzipay\Request\CreateRefundToAmountBasedRequest;
use Iyzipay\Tests\TestCase;

class CreateRefundToAmountBasedRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("1", $jsonObject["paymentId"]);
        $this->assertEquals("0.1", $jsonObject["price"]);
        $this->assertEquals("85.34.78.112", $jsonObject["ip"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = $this->prepareRequest();

        $str = "[locale=tr," .
            "conversationId=123456789," .
            "paymentId=123456789," .
            "price=0.1," .
            "ip=85.34.78.112";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();

        $json = '
            {   
                "paymentId": "12705464",
                "price": "5.0",
                "ip": "127.0.0.1",
                "locale": "tr",
                "conversationId": "conversationId"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new CreateRefundToAmountBasedRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentId("12705464");
        $request->setPrice("0.1");
        $request->setIp("85.34.78.112");
        $request->setConversationId("12705464");
        return $request;
    }
}
