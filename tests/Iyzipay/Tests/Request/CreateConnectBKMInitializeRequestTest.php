<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Locale;
use Iyzipay\Request\CreateConnectBKMInitializeRequest;
use Iyzipay\Tests\TestCase;

class CreateConnectBKMInitializeRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = new CreateConnectBKMInitializeRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setPrice("1");
        $request->setCallbackUrl("https://www.merchant.com/callback");

        # prepare buyer
        $request->setBuyerId("100");
        $request->setBuyerEmail("email@email.com");
        $request->setBuyerIp("85.34.78.112");

        # prepare default pos
        $request->setConnectorName("connector name");
        $request->setInstallmentDetails(array());
        $request->setPosOrderId("pos order id");

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
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = new CreateConnectBKMInitializeRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setPrice("1");
        $request->setCallbackUrl("https://www.merchant.com/callback");

        # prepare buyer
        $request->setBuyerId("100");
        $request->setBuyerEmail("email@email.com");
        $request->setBuyerIp("85.34.78.112");

        # prepare default pos
        $request->setConnectorName("connector name");
        $request->setInstallmentDetails(array());
        $request->setPosOrderId("pos order id");

        $str = "[locale=tr," .
            "conversationId=123456789," .
            "connectorName=connector name," .
            "price=1.0," .
            "callbackUrl=https://www.merchant.com/callback," .
            "buyerEmail=email@email.com," .
            "buyerId=100," .
            "buyerIp=85.34.78.112," .
            "posOrderId=pos order id," .
            "installmentDetails=[]]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = new CreateConnectBKMInitializeRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setPrice("1");
        $request->setCallbackUrl("https://www.merchant.com/callback");

        # prepare buyer
        $request->setBuyerId("100");
        $request->setBuyerEmail("email@email.com");
        $request->setBuyerIp("85.34.78.112");

        # prepare default pos
        $request->setConnectorName("connector name");
        $request->setInstallmentDetails(array());
        $request->setPosOrderId("pos order id");

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
                "posOrderId":"pos order id"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }
}
