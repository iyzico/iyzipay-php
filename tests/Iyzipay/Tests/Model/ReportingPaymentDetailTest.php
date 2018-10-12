<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\ReportingPaymentDetail;
use Iyzipay\Request\ReportingPaymentDetailRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ReportingPaymentDetailTest extends IyzipayResourceTestCase
{
    public function test_should_reporting_payment_detail()
    {
        $this->expectHttpGetV2();

        $create = ReportingPaymentDetail::create(new ReportingPaymentDetailRequest(), $this->options);

        $this->verifyResource($create);
    }
}