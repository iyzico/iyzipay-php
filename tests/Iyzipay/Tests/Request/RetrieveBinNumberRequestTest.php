<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Locale;
use Iyzipay\Request\RetrieveBinNumberRequest;
use Iyzipay\Tests\TestCase;

class RetrieveBinNumberRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = new RetrieveBinNumberRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456");
        $request->setBinNumber("454671");

        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456", $jsonObject["conversationId"]);
        $this->assertEquals("454671", $jsonObject["binNumber"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = new RetrieveBinNumberRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456");
        $request->setBinNumber("454671");

        $str = "[locale=tr," .
            "conversationId=123456," .
            "binNumber=454671]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = new RetrieveBinNumberRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456");
        $request->setBinNumber("454671");

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456",
                "binNumber":"454671"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }
}