<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\CardInformation;
use Iyzipay\Model\Locale;
use Iyzipay\Request\CreateCardRequest;
use Iyzipay\Tests\TestCase;

class CreateCardRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("email@email.com", $jsonObject["email"]);
        $this->assertEquals("external id", $jsonObject["externalId"]);
        $this->assertEquals("card user key", $jsonObject["cardUserKey"]);
        $this->assertEquals("card alias", $jsonObject["card"]["cardAlias"]);
        $this->assertEquals("John Doe", $jsonObject["card"]["cardHolderName"]);
        $this->assertEquals("John Doe", $jsonObject["card"]["cardHolderName"]);
        $this->assertEquals("5528790000000008", $jsonObject["card"]["cardNumber"]);
        $this->assertEquals("12", $jsonObject["card"]["expireMonth"]);
        $this->assertEquals("2030", $jsonObject["card"]["expireYear"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = $this->prepareRequest();

        $str = "[locale=tr," .
            "conversationId=123456789," .
            "externalId=external id," .
            "email=email@email.com," .
            "cardUserKey=card user key," .
            "card=[cardAlias=card alias," .
            "cardNumber=5528790000000008," .
            "expireYear=2030," .
            "expireMonth=12," .
            "cardHolderName=John Doe]]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456789",
                "externalId":"external id",
                "email":"email@email.com",
                "cardUserKey":"card user key",
                "card":
                {
                    "cardAlias":"card alias",
                    "cardNumber":"5528790000000008",
                    "expireYear":"2030",
                    "expireMonth":"12",
                    "cardHolderName":"John Doe"
                }
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new CreateCardRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setEmail("email@email.com");
        $request->setCardUserKey("card user key");
        $request->setExternalId("external id");

        $cardInformation = new CardInformation();
        $cardInformation->setCardAlias("card alias");
        $cardInformation->setCardHolderName("John Doe");
        $cardInformation->setCardNumber("5528790000000008");
        $cardInformation->setExpireMonth("12");
        $cardInformation->setExpireYear("2030");
        $request->setCard($cardInformation);
        return $request;
    }
}
