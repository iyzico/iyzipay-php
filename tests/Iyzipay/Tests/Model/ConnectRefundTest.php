<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\ConnectRefund;
use Iyzipay\Request\CreateRefundRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ConnectRefundTest extends IyzipayResourceTestCase
{
    public function test_should_refund_connect()
    {
        $this->expectHttpPost();

        $connectRefund = ConnectRefund::create(new CreateRefundRequest(), $this->options);

        $this->verifyResource($connectRefund);
    }
}