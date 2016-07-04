<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\PaymentCard;
use Iyzipay\Request\CreateBasicPaymentRequest;
use Iyzipay\Tests\TestCase;

class CreateBasicPaymentRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("email@email.com", $jsonObject["buyerEmail"]);
        $this->assertEquals("B2323", $jsonObject["buyerId"]);
        $this->assertEquals("85.34.78.112", $jsonObject["buyerIp"]);
        $this->assertEquals("connector name", $jsonObject["connectorName"]);
        $this->assertEquals("1", $jsonObject["installment"]);
        $this->assertEquals("1", $jsonObject["paidPrice"]);
        $this->assertEquals("1", $jsonObject["price"]);
        $this->assertEquals("TRY", $jsonObject["currency"]);
        $this->assertEquals("order", $jsonObject["posOrderId"]);
        $this->assertEquals("callback", $jsonObject["callbackUrl"]);
        $this->assertEquals("alias", $jsonObject["paymentCard"]["cardAlias"]);
        $this->assertEquals("John Doe", $jsonObject["paymentCard"]["cardHolderName"]);
        $this->assertEquals("5528790000000008", $jsonObject["paymentCard"]["cardNumber"]);
        $this->assertEquals("12", $jsonObject["paymentCard"]["expireMonth"]);
        $this->assertEquals("2030", $jsonObject["paymentCard"]["expireYear"]);
        $this->assertEquals("123", $jsonObject["paymentCard"]["cvc"]);
        $this->assertEquals("0", $jsonObject["paymentCard"]["registerCard"]);
        $this->assertEquals("token", $jsonObject["paymentCard"]["cardToken"]);
        $this->assertEquals("user key", $jsonObject["paymentCard"]["cardUserKey"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = $this->prepareRequest();

        $str = "[locale=tr," .
            "conversationId=123456789," .
            "price=1.0," .
            "paidPrice=1.0," .
            "installment=1," .
            "buyerEmail=email@email.com," .
            "buyerId=B2323," .
            "buyerIp=85.34.78.112," .
            "posOrderId=order," .
            "paymentCard=[cardHolderName=John Doe," .
            "cardNumber=5528790000000008," .
            "expireYear=2030," .
            "expireMonth=12," .
            "cvc=123," .
            "registerCard=0," .
            "cardAlias=alias," .
            "cardToken=token," .
            "cardUserKey=user key]," .
            "currency=TRY," .
            "connectorName=connector name," .
            "callbackUrl=callback]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456789",
                "price":"1.0",
                "paidPrice":"1.0",
                "installment":"1",
                "buyerEmail":"email@email.com",
                "buyerId":"B2323",
                "buyerIp":"85.34.78.112",
                "posOrderId":"order",
                "paymentCard":
                {
                    "cardHolderName":"John Doe",
                    "cardNumber":"5528790000000008",
                    "expireYear":"2030",
                    "expireMonth":"12",
                    "cvc":"123",
                    "registerCard":0,
                    "cardAlias":"alias",
                    "cardToken":"token",
                    "cardUserKey":"user key"
                },
                "currency":"TRY",
                "connectorName":"connector name",
                "callbackUrl":"callback"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new CreateBasicPaymentRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setBuyerEmail("email@email.com");
        $request->setBuyerId("B2323");
        $request->setBuyerIp("85.34.78.112");
        $request->setConnectorName("connector name");
        $request->setInstallment(1);
        $request->setPaidPrice("1");
        $request->setPrice("1");
        $request->setCurrency(Currency::TL);
        $request->setPosOrderId("order");
        $request->setCallbackUrl("callback");

        $paymentCard = new PaymentCard();
        $paymentCard->setCardAlias("alias");
        $paymentCard->setCardHolderName("John Doe");
        $paymentCard->setCardNumber("5528790000000008");
        $paymentCard->setExpireMonth("12");
        $paymentCard->setExpireYear("2030");
        $paymentCard->setCvc("123");
        $paymentCard->setRegisterCard(0);
        $paymentCard->setCardToken("token");
        $paymentCard->setCardUserKey("user key");
        $request->setPaymentCard($paymentCard);
        return $request;
    }
}
