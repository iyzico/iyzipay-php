<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\ReportingPaymentTransaction;
use Iyzipay\Request\ReportingPaymentTransactionRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ReportingPaymentTransactionTest extends IyzipayResourceTestCase
{
    public function test_should_reporting_payment_transaction()
    {
        $this->expectHttpGetV2();

        $create = ReportingPaymentTransaction::create(new ReportingPaymentTransactionRequest(), $this->options);

        $this->verifyResource($create);
    }
}