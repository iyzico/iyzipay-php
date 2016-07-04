<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\BkmInstallment;
use Iyzipay\Model\BkmInstallmentPrice;
use Iyzipay\Model\Locale;
use Iyzipay\Request\CreateBasicBkmInitializeRequest;
use Iyzipay\Tests\TestCase;

class CreateBasicBkmInitializeRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("1", $jsonObject["price"]);
        $this->assertEquals("https://www.merchant.com/callback", $jsonObject["callbackUrl"]);
        $this->assertEquals("100", $jsonObject["buyerId"]);
        $this->assertEquals("email@email.com", $jsonObject["buyerEmail"]);
        $this->assertEquals("85.34.78.112", $jsonObject["buyerIp"]);
        $this->assertEquals("connector name", $jsonObject["connectorName"]);
        $this->assertEquals("pos order id", $jsonObject["posOrderId"]);
        $this->assertNotEmpty($jsonObject["installmentDetails"]);
        $this->assertEquals(1, count($jsonObject["installmentDetails"]));
        $this->assertEquals("64", $jsonObject["installmentDetails"][0]["bankId"]);
        $this->assertNotEmpty($jsonObject["installmentDetails"][0]["installmentPrices"]);
        $this->assertEquals(5, count($jsonObject["installmentDetails"][0]["installmentPrices"]));
        $this->assertEquals("1", $jsonObject["installmentDetails"][0]["installmentPrices"][0]["installmentNumber"]);
        $this->assertEquals("1", $jsonObject["installmentDetails"][0]["installmentPrices"][0]["totalPrice"]);
        $this->assertEquals("2", $jsonObject["installmentDetails"][0]["installmentPrices"][1]["installmentNumber"]);
        $this->assertEquals("1.1", $jsonObject["installmentDetails"][0]["installmentPrices"][1]["totalPrice"]);
        $this->assertEquals("3", $jsonObject["installmentDetails"][0]["installmentPrices"][2]["installmentNumber"]);
        $this->assertEquals("1.1", $jsonObject["installmentDetails"][0]["installmentPrices"][2]["totalPrice"]);
        $this->assertEquals("6", $jsonObject["installmentDetails"][0]["installmentPrices"][3]["installmentNumber"]);
        $this->assertEquals("1.2", $jsonObject["installmentDetails"][0]["installmentPrices"][3]["totalPrice"]);
        $this->assertEquals("9", $jsonObject["installmentDetails"][0]["installmentPrices"][4]["installmentNumber"]);
        $this->assertEquals("1.4", $jsonObject["installmentDetails"][0]["installmentPrices"][4]["totalPrice"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = $this->prepareRequest();

        $str = "[locale=tr," .
            "conversationId=123456789," .
            "connectorName=connector name," .
            "price=1.0," .
            "callbackUrl=https://www.merchant.com/callback," .
            "buyerEmail=email@email.com," .
            "buyerId=100," .
            "buyerIp=85.34.78.112," .
            "posOrderId=pos order id," .
            "installmentDetails=[[bankId=64," .
            "installmentPrices=[[installmentNumber=1,totalPrice=1.0], " .
            "[installmentNumber=2,totalPrice=1.1], " .
            "[installmentNumber=3,totalPrice=1.1], " .
            "[installmentNumber=6,totalPrice=1.2], " .
            "[installmentNumber=9,totalPrice=1.4]]]]]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456789",
                "connectorName":"connector name",
                "price":"1.0",
                "callbackUrl":"https://www.merchant.com/callback",
                "buyerEmail":"email@email.com",
                "buyerId":"100",
                "buyerIp":"85.34.78.112",
                "posOrderId":"pos order id",
                "installmentDetails":[
                {
                    "bankId":64,
                    "installmentPrices":[
                    {
                        "installmentNumber":1,
                        "totalPrice":"1.0"
                    },
                    {
                        "installmentNumber":2,
                        "totalPrice":"1.1"
                    },
                    {
                        "installmentNumber":3,
                        "totalPrice":"1.1"
                    },
                    {
                        "installmentNumber":6,
                        "totalPrice":"1.2"
                    },
                    {
                        "installmentNumber":9,
                        "totalPrice":"1.4"
                    }]
                }]
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new CreateBasicBkmInitializeRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setPrice("1");
        $request->setCallbackUrl("https://www.merchant.com/callback");
        $request->setBuyerId("100");
        $request->setBuyerEmail("email@email.com");
        $request->setBuyerIp("85.34.78.112");
        $request->setConnectorName("connector name");
        $request->setPosOrderId("pos order id");

        $installmentDetails = array();

        $installmentDetail = new BkmInstallment();
        $installmentDetail->setBankId(64);

        $installmentPrices = array();

        $singleInstallment = new BkmInstallmentPrice();
        $singleInstallment->setInstallmentNumber(1);
        $singleInstallment->setTotalPrice("1");

        $twoInstallments = new BkmInstallmentPrice();
        $twoInstallments->setInstallmentNumber(2);
        $twoInstallments->setTotalPrice("1.1");

        $threeInstallments = new BkmInstallmentPrice();
        $threeInstallments->setInstallmentNumber(3);
        $threeInstallments->setTotalPrice("1.1");

        $sixInstallments = new BkmInstallmentPrice();
        $sixInstallments->setInstallmentNumber(6);
        $sixInstallments->setTotalPrice("1.2");

        $nineInstallments = new BkmInstallmentPrice();
        $nineInstallments->setInstallmentNumber(9);
        $nineInstallments->setTotalPrice("1.4");

        $installmentPrices[0] = $singleInstallment;
        $installmentPrices[1] = $twoInstallments;
        $installmentPrices[2] = $threeInstallments;
        $installmentPrices[3] = $sixInstallments;
        $installmentPrices[4] = $nineInstallments;

        $installmentDetail->setInstallmentPrices($installmentPrices);
        $installmentDetails[0] = $installmentDetail;

        $request->setInstallmentDetails($installmentDetails);
        return $request;
    }
}
