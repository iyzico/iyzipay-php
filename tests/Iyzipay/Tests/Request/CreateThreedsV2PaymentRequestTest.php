<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Locale;
use Iyzipay\Model\Currency;
use Iyzipay\Request\CreateThreedsV2PaymentRequest;
use Iyzipay\Tests\TestCase;

class CreateThreedsV2PaymentRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("1", $jsonObject["paymentId"]);
        $this->assertEquals("1.2", $jsonObject["paidPrice"]);
        $this->assertEquals("B123456", $jsonObject["basketId"]);
        $this->assertEquals(Currency::EUR, $jsonObject["currency"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = $this->prepareRequest();

        $str = "[locale=tr," .
            "conversationId=123456789," .
            "paymentId=1," .
            "paidPrice=1.2," .
            "basketId=B123456," .
            "currency=EUR]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456789",
                "paymentId":"1",
                "paidPrice":"1.2",
                "basketId":"B123456",
                "currency":"EUR"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new CreateThreedsV2PaymentRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentId("1");
        $request->setPaidPrice("1.2");
        $request->setBasketId("B123456");
        $request->setCurrency(Currency::EUR);
        return $request;
    }
}