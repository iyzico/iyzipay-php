<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Locale;
use Iyzipay\Request\RetrieveSubMerchantRequest;
use Iyzipay\Tests\TestCase;

class RetrieveSubMerchantRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = new RetrieveSubMerchantRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubMerchantExternalId("AS49224");

        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("AS49224", $jsonObject["subMerchantExternalId"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = new RetrieveSubMerchantRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubMerchantExternalId("AS49224");

        $str = "[locale=tr," .
            "conversationId=123456789," .
            "subMerchantExternalId=AS49224]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = new RetrieveSubMerchantRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubMerchantExternalId("AS49224");

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456789",
                "subMerchantExternalId":"AS49224"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }
}
