<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Mapper\ReportingPaymentTransactionMapper;
use Iyzipay\Model\ReportingPaymentTransaction;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class ReportingPaymentTransactionMapperTest extends TestCase
{
    public function test_should_map_reporting_transaction_payment()
    {
        $json = $this->retrieveJsonFile("reporting-payment-transaction.json");

        $create = ReportingPaymentTransactionMapper::create($json)->jsonDecode()->mapReportingPaymentTransaction(new ReportingPaymentTransaction());

        $this->assertNotEmpty($create);
        $this->assertEquals(Status::SUCCESS, $create->getStatus());
        $this->assertEquals(1539172617607, $create->getSystemTime());
        $this->assertEquals("123456789", $create->getConversationId());
        $this->assertEquals("test", $create->getTransactions());
        $this->assertEquals(1, $create->getCurrentPage());
        $this->assertEquals(1, $create->getTotalPageCount());

        $this->assertJson($create->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $create->getRawResult());
    }
}