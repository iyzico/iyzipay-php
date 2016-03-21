<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Locale;
use Iyzipay\Request\CreateApprovalRequest;
use Iyzipay\Tests\TestCase;

class CreateApprovalRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = new CreateApprovalRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456");
        $request->setPaymentTransactionId("1");

        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456", $jsonObject["conversationId"]);
        $this->assertEquals("1", $jsonObject["paymentTransactionId"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = new CreateApprovalRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456");
        $request->setPaymentTransactionId("1");

        $str = "[locale=tr," .
            "conversationId=123456," .
            "paymentTransactionId=1]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = new CreateApprovalRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456");
        $request->setPaymentTransactionId("1");

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456",
                "paymentTransactionId":"1"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }
}