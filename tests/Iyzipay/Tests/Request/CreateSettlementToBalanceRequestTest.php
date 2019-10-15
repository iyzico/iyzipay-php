<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Request\CreateSettlementToBalanceRequest;
use Iyzipay\Tests\TestCase;

class CreateSettlementToBalanceRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();


        $this->assertEquals("123456", $jsonObject["subMerchantKey"]);
        $this->assertEquals("https://callback", $jsonObject["callbackUrl"]);
        $this->assertEquals("0.01", $jsonObject["price"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = $this->prepareRequest();

        $str = "[subMerchantKey=123456," .
            "callbackUrl=https://callback,".
            "price=0.01]";


        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();

        $json = '
            {
                "subMerchantKey":"123456",
                "callbackUrl":"https://callback",
                "price":"0.01"

            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new CreateSettlementToBalanceRequest();
        $request->setSubMerchantKey("123456");
        $request->setCallbackUrl("https://callback");
        $request->setPrice("0.01");
        return $request;
    }
}
