<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Locale;
use Iyzipay\Request\UpdateBlackListedCardRequest;
use Iyzipay\Tests\TestCase;

class UpdateBlacklistedCardRequestTest extends TestCase {
    public function test_should_get_json_object() {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("card token", $jsonObject["cardToken"]);
        $this->assertEquals("card user key", $jsonObject["cardUserKey"]);
    }

    public function test_should_convert_to_pki_request_string(): void {
        $request = $this->prepareRequest();

        $str = "[locale=tr," .
            "conversationId=123456789," .
            "cardToken=card token," .
            "cardUserKey=card user key]";
//            "cardToken=card token]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string(): void {
        $request = $this->prepareRequest();

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

    private function prepareRequest(): UpdateBlackListedCardRequest {
        $request = new UpdateBlackListedCardRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setCardToken("card token");
        $request->setCardUserKey("card user key");
        return $request;
    }
}
