<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Locale;
use Iyzipay\Request\ReportingPaymentTransactionRequest;
use Iyzipay\Tests\TestCase;

class ReportingPaymentTransactionRequestTest extends TestCase
{
    public function test_should_report_payment_transaction_request_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("2018-10-10", $jsonObject["transactionDate"]);
        $this->assertEquals(1, $jsonObject["page"]);
    }

    private function prepareRequest()
    {
        $request = new ReportingPaymentTransactionRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setTransactionDate("2018-10-10");
        $request->setPage(1);

        return $request;
    }
}