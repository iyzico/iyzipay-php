<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Locale;
use Iyzipay\Model\Currency;
use Iyzipay\Tests\TestCase;

class RetrieveLoyaltyRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals(Currency::TL, $jsonObject["currency"]);
        $this->assertEquals("John Doe", $jsonObject["paymentCard"]["cardHolderName"]);
        $this->assertEquals("5451030000000000", $jsonObject["paymentCard"]["cardNumber"]);
        $this->assertEquals("12", $jsonObject["paymentCard"]["expireMonth"]);
        $this->assertEquals("2030", $jsonObject["paymentCard"]["expireYear"]);
        $this->assertEquals("123", $jsonObject["paymentCard"]["cvc"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = $this->prepareRequest();

        $str = "[locale=tr," .
            "conversationId=123456789," .
            "paymentCard=[cardHolderName=John Doe," .
            "cardNumber=5451030000000000," .
            "expireYear=2030," .
            "expireMonth=12," .
            "cvc=123]," .
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
                "paymentCard":
                {
                    "cardHolderName":"John Doe",
                    "cardNumber":"5451030000000000",
                    "expireYear":"2030",
                    "expireMonth":"12",
                    "cvc":"123"
                },
                "currency":"TRY"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new \Iyzipay\Request\RetrieveLoyaltyRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setCurrency(\Iyzipay\Model\Currency::TL);

        $paymentCard = new \Iyzipay\Model\PaymentCard();
        $paymentCard->setCardHolderName("John Doe");
        $paymentCard->setCardNumber("5451030000000000");
        $paymentCard->setExpireMonth("12");
        $paymentCard->setExpireYear("2030");
        $paymentCard->setCvc("123");
        $request->setPaymentCard($paymentCard);
        return $request;
    }
}