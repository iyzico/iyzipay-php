<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Request\UCSInitializeRequest;
use Iyzipay\Tests\TestCase;

class UCSInitializeRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();
        $this->assertEquals("johndoe@iyzico.com", $jsonObject["email"]);
        $this->assertEquals("+905555555555", $jsonObject["gsmNumber"]);
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();
        $json = '{
                  "email": "johndoe@iyzico.com",
                  "gsmNumber": "+905555555555"
                }';
        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new UCSInitializeRequest();
        $request->setEmail("johndoe@iyzico.com");
        $request->setGsmNumber("+905555555555");
        return $request;
    }
}
