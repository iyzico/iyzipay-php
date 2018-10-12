<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Mapper\ReportingPaymentDetailResourceMapper;
use Iyzipay\Model\ReportingPaymentDetail;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class ReportingPaymentDetailResourceMapperTest extends TestCase
{
    public function test_should_map_resource_reporting_detail_payment()
    {
        $json = $this->retrieveJsonFile("reporting-payment-detail.json");

        $create = ReportingPaymentDetailResourceMapper::create($json)->jsonDecode()->mapReportingPaymentDetailResource(new ReportingPaymentDetail());

        $this->assertNotEmpty($create);
        $this->assertEquals(Status::SUCCESS, $create->getStatus());
        $this->assertEquals(1539173290339, $create->getSystemTime());
        $this->assertEquals("test", $create->getPayments());
        $this->assertJson($create->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $create->getRawResult());
    }
}