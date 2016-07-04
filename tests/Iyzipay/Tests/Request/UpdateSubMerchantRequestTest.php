<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Request\UpdateSubMerchantRequest;
use Iyzipay\Tests\TestCase;

class UpdateSubMerchantRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("sub merchant key", $jsonObject["subMerchantKey"]);
        $this->assertEquals("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1", $jsonObject["address"]);
        $this->assertEquals("John", $jsonObject["contactName"]);
        $this->assertEquals("Doe", $jsonObject["contactSurname"]);
        $this->assertEquals("email@submerchantemail.com", $jsonObject["email"]);
        $this->assertEquals("+905350000000", $jsonObject["gsmNumber"]);
        $this->assertEquals("John's market", $jsonObject["name"]);
        $this->assertEquals("TR180006200119000006672315", $jsonObject["iban"]);
        $this->assertEquals("1234567890", $jsonObject["identityNumber"]);
        $this->assertEquals("TRY", $jsonObject["currency"]);
        $this->assertEquals("swift code", $jsonObject["swiftCode"]);
        $this->assertEquals("Tax office", $jsonObject["taxOffice"]);
        $this->assertEquals("9261877", $jsonObject["taxNumber"]);
        $this->assertEquals("ABC inc", $jsonObject["legalCompanyTitle"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = $this->prepareRequest();

        $str = "[locale=tr," .
            "conversationId=123456789," .
            "name=John's market," .
            "email=email@submerchantemail.com," .
            "gsmNumber=+905350000000," .
            "address=Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1," .
            "iban=TR180006200119000006672315," .
            "taxOffice=Tax office," .
            "contactName=John," .
            "contactSurname=Doe," .
            "legalCompanyTitle=ABC inc," .
            "swiftCode=swift code," .
            "currency=TRY," .
            "subMerchantKey=sub merchant key," .
            "identityNumber=1234567890," .
            "taxNumber=9261877]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456789",
                "subMerchantKey":"sub merchant key",
                "address":"Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1",
                "contactName":"John",
                "contactSurname":"Doe",
                "email":"email@submerchantemail.com",
                "gsmNumber":"+905350000000",
                "name":"John\'s market",
                "iban":"TR180006200119000006672315",
                "identityNumber":"1234567890",
                "currency":"TRY",
                "swiftCode":"swift code",
                "taxOffice":"Tax office",
                "taxNumber":"9261877",
                "legalCompanyTitle":"ABC inc"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new UpdateSubMerchantRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubMerchantKey("sub merchant key");
        $request->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $request->setContactName("John");
        $request->setContactSurname("Doe");
        $request->setEmail("email@submerchantemail.com");
        $request->setGsmNumber("+905350000000");
        $request->setName("John's market");
        $request->setIban("TR180006200119000006672315");
        $request->setIdentityNumber("1234567890");
        $request->setCurrency(Currency::TL);
        $request->setSwiftCode("swift code");
        $request->setTaxOffice("Tax office");
        $request->setTaxNumber("9261877");
        $request->setLegalCompanyTitle("ABC inc");
        return $request;
    }
}
