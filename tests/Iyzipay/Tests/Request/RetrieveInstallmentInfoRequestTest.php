<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Request\RetrieveInstallmentInfoRequest;
use Iyzipay\Tests\TestCase;

class RetrieveInstallmentInfoRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("454671", $jsonObject["binNumber"]);
        $this->assertEquals("1", $jsonObject["price"]);
        $this->assertEquals(Currency::TL, $jsonObject["currency"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = $this->prepareRequest();

        $str = "[locale=tr," .
            "conversationId=123456789," .
            "binNumber=454671," .
            "price=1.0," .
            "currency=TRY]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456789",
                "binNumber":"454671",
                "price":"1.0",
                "currency":"TRY"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new RetrieveInstallmentInfoRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setBinNumber("454671");
        $request->setPrice("1");
        $request->setCurrency(Currency::TL);
        return $request;
    }
}
