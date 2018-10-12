<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Locale;
use Iyzipay\Request\ReportingPaymentDetailRequest;
use Iyzipay\Tests\TestCase;

class ReportingPaymentDetailRequestTest extends TestCase
{
    public function test_should_report_payment_detail_request_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("123456789", $jsonObject["paymentConversationId"]);
    }

    private function prepareRequest()
    {
        $request = new ReportingPaymentDetailRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentConversationId("123456789");

        return $request;
    }
}