<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Locale;
use Iyzipay\Request\CreateC2CSubMerchantRequest;
use Iyzipay\Tests\TestCase;

class CreateC2CSubMerchantRequestTest extends TestCase {
    public function testShouldGetJsonObject(): void {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("299487456", $jsonObject["conversationId"]);
        $this->assertEquals("John", $jsonObject["name"]);
        $this->assertEquals("Doe", $jsonObject["surname"]);
        $this->assertEquals("john@doe.com", $jsonObject["email"]);
        $this->assertEquals("+905558001479", $jsonObject["gsmNumber"]);
        $this->assertEquals("55555555555", $jsonObject["tckNo"]);
        $this->assertEquals("1996-10-07", $jsonObject["birthDate"]);
        $this->assertEquals("Besiktas / Istanbul", $jsonObject["address"]);
        $this->assertEquals("ccd74b86-e4a8-469e-b3d3-312f0544ea6e", $jsonObject["externalId"]);
    }

    public function testShouldConvertToPkiRequestString(): void {
        $request = $this->prepareRequest();

        $str =
            "[locale=tr," .
            "conversationId=299487456," .
            "name=John," .
            "surname=Doe," .
            "email=john@doe.com," .
            "gsmNumber=+905558001479," .
            "tckNo=55555555555," .
            "birthDate=1996-10-07," .
            "address=Besiktas / Istanbul," .
            "externalId=ccd74b86-e4a8-469e-b3d3-312f0544ea6e]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function testShouldGetJsonString(): void {
        $request = $this->prepareRequest();

        $json = '
            {
                "locale":"tr",
                "conversationId":"299487456",
                "name":"John",
                "surname":"Doe",
                "email":"john@doe.com",
                "gsmNumber":"+905558001479",
                "tckNo":"55555555555",
                "birthDate":"1996-10-07",
                "address":"Besiktas / Istanbul",
                "externalId":"ccd74b86-e4a8-469e-b3d3-312f0544ea6e"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest(): CreateC2CSubMerchantRequest {
        $request = new CreateC2CSubMerchantRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId('299487456');
        $request->setName('John');
        $request->setSurname('Doe');
        $request->setEmail('john@doe.com');
        $request->setGsmNumber('+905558001479');
        $request->setTckNo('55555555555');
        $request->setBirthDate('1996-10-07');
        $request->setAddress('Besiktas / Istanbul');
        $request->setExternalId('ccd74b86-e4a8-469e-b3d3-312f0544ea6e');
        return $request;
    }
}
