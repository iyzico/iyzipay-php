<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Locale;
use Iyzipay\Request\RetrieveBkmRequest;
use Iyzipay\Tests\TestCase;

class RetrieveBkmRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = new RetrieveBkmRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setToken("token");

        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("token", $jsonObject["token"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = new RetrieveBkmRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setToken("token");

        $str = "[locale=tr," .
            "conversationId=123456789," .
            "token=token]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = new RetrieveBkmRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setToken("token");

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456789",
                "token":"token"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }
}
