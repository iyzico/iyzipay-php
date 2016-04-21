<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Locale;
use Iyzipay\Request\RetrieveInstallmentInfoRequest;
use Iyzipay\Tests\TestCase;

class RetrieveInstallmentInfoRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = new RetrieveInstallmentInfoRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setBinNumber("454671");
        $request->setPrice("1");

        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("454671", $jsonObject["binNumber"]);
        $this->assertEquals("1", $jsonObject["price"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = new RetrieveInstallmentInfoRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setBinNumber("454671");
        $request->setPrice("1");

        $str = "[locale=tr," .
            "conversationId=123456789," .
            "binNumber=454671," .
            "price=1.0]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = new RetrieveInstallmentInfoRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setBinNumber("454671");
        $request->setPrice("1");

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456789",
                "binNumber":"454671",
                "price":"1.0"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }
}
