<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Locale;
use Iyzipay\Request\RetrieveProtectedOverleyScriptRequest;
use Iyzipay\Tests\TestCase;

class RetrieveProtectedOverleyScriptRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456", $jsonObject["conversationId"]);
        $this->assertEquals("bottomLeft", $jsonObject["position"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = $this->prepareRequest();

        $str = "[locale=tr," .
            "conversationId=123456," .
            "position=bottomLeft]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456",
                "position":"bottomLeft"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new RetrieveProtectedOverleyScriptRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456");
        $request->setPosition("bottomLeft");
        return $request;
    }
}