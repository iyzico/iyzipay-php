<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Locale;
use Iyzipay\Request\RetrieveBlacklistedCardRequest;
use Iyzipay\Tests\TestCase;

class RetrieveBlacklistedCardRequestTest extends TestCase {
    public function test_should_get_json_object() {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("card number", $jsonObject["cardNumber"]);
    }

    public function test_should_convert_to_pki_request_string() {
        $request = $this->prepareRequest();

        $str = "[locale=tr," .
            "conversationId=123456789," .
            "cardNumber=card number]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string() {
        $request = $this->prepareRequest();

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456789",
                "cardNumber":"card number"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest(): RetrieveBlacklistedCardRequest {
        $request = new RetrieveBlacklistedCardRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setCardNumber("card number");
        return $request;
    }
}
