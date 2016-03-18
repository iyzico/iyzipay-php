<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\Locale;
use Iyzipay\Request;

class RequestTest extends BaseTest
{
    public function test_should_get_json_object()
    {
        $request = new Request();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456");

        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456", $jsonObject["conversationId"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = new Request();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456");

        $this->assertEquals("[locale=tr,conversationId=123456]", $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = new Request();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456");

        $this->assertEquals("{\"locale\":\"tr\",\"conversationId\":\"123456\"}", $request->toJsonString());
    }
}