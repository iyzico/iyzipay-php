<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\SubMerchantType;
use Iyzipay\Request\CreateSubMerchantRequest;
use Iyzipay\Tests\TestCase;

class CreateSubMerchantRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("B49224", $jsonObject["subMerchantExternalId"]);
        $this->assertEquals("PERSONAL", $jsonObject["subMerchantType"]);
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
        $this->assertEquals("John Doe inc", $jsonObject["legalCompanyTitle"]);
        $this->assertEquals("Tax office", $jsonObject["taxOffice"]);
        $this->assertEquals("9261877", $jsonObject["taxNumber"]);
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
            "legalCompanyTitle=John Doe inc," .
            "swiftCode=swift code," .
            "currency=TRY," .
            "subMerchantExternalId=B49224," .
            "identityNumber=1234567890," .
            "taxNumber=9261877," .
            "subMerchantType=PERSONAL]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456789",
                "subMerchantExternalId":"B49224",
                "subMerchantType":"PERSONAL",
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
                "legalCompanyTitle":"John Doe inc"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new CreateSubMerchantRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubMerchantExternalId("B49224");
        $request->setSubMerchantType(SubMerchantType::PERSONAL);
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
        $request->setLegalCompanyTitle("John Doe inc");
        $request->setTaxOffice("Tax office");
        $request->setTaxNumber("9261877");
        return $request;
    }
}
