<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\RefundReason;
use Iyzipay\Request\CreateRefundRequest;
use Iyzipay\Tests\TestCase;

class CreateRefundRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("1", $jsonObject["paymentTransactionId"]);
        $this->assertEquals("0.1", $jsonObject["price"]);
        $this->assertEquals("85.34.78.112", $jsonObject["ip"]);
        $this->assertEquals("TRY", $jsonObject["currency"]);
        $this->assertEquals("other", $jsonObject["reason"]);
        $this->assertEquals("customer requested for default sample", $jsonObject["description"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = $this->prepareRequest();

        $str = "[locale=tr," .
            "conversationId=123456789," .
            "paymentTransactionId=1," .
            "price=0.1," .
            "ip=85.34.78.112," .
            "currency=TRY," .
            "reason=other," .
            "description=customer requested for default sample]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456789",
                "paymentTransactionId":"1",
                "price":"0.1",
                "ip":"85.34.78.112",
                "currency":"TRY",
                "reason":"other",
                "description":"customer requested for default sample"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new CreateRefundRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentTransactionId("1");
        $request->setPrice("0.1");
        $request->setIp("85.34.78.112");
        $request->setCurrency(Currency::TL);
        $request->setReason(RefundReason::OTHER);
        $request->setDescription("customer requested for default sample");
        return $request;
    }
}
