<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Request\CreateRefundToBalanceRequest;
use Iyzipay\Tests\TestCase;

class CreateRefundToBalanceRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();


        $this->assertEquals("123456", $jsonObject["paymentId"]);
        $this->assertEquals("https://callback", $jsonObject["callbackUrl"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = $this->prepareRequest();

        $str = "[paymentId=123456," .
            "callbackUrl=https://callback]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();

        $json = '
            {
                "paymentId":"123456",
                "callbackUrl":"https://callback"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new CreateRefundToBalanceRequest();
        $request->setPaymentId("123456");
        $request->setCallbackUrl("https://callback");
        return $request;
    }
}
