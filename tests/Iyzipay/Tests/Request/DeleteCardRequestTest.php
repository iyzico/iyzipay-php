<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Locale;
use Iyzipay\Request\DeleteCardRequest;
use Iyzipay\Tests\TestCase;

class DeleteCardRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = new DeleteCardRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setCardToken("card token");
        $request->setCardUserKey("card user key");

        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("card token", $jsonObject["cardToken"]);
        $this->assertEquals("card user key", $jsonObject["cardUserKey"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = new DeleteCardRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setCardToken("card token");
        $request->setCardUserKey("card user key");

        $str = "[locale=tr," .
            "conversationId=123456789," .
            "cardUserKey=card user key," .
            "cardToken=card token]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = new DeleteCardRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setCardToken("card token");
        $request->setCardUserKey("card user key");

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456789",
                "cardToken":"card token",
                "cardUserKey":"card user key"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }
}
