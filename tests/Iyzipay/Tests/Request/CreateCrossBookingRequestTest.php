<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Locale;
use Iyzipay\Request\CreateCrossBookingRequest;
use Iyzipay\Tests\TestCase;

class CreateCrossBookingRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = new CreateCrossBookingRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubmerchantKey("sub merchant key");
        $request->setPrice("1");
        $request->setReason("reason text");

        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("sub merchant key", $jsonObject["subMerchantKey"]);
        $this->assertEquals("1", $jsonObject["price"]);
        $this->assertEquals("reason text", $jsonObject["reason"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = new CreateCrossBookingRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubmerchantKey("sub merchant key");
        $request->setPrice("1");
        $request->setReason("reason text");

        $str = "[locale=tr," .
            "conversationId=123456789," .
            "subMerchantKey=sub merchant key," .
            "price=1.0," .
            "reason=reason text]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = new CreateCrossBookingRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubmerchantKey("sub merchant key");
        $request->setPrice("1");
        $request->setReason("reason text");

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456789",
                "subMerchantKey":"sub merchant key",
                "price":"1.0",
                "reason":"reason text"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }
}
