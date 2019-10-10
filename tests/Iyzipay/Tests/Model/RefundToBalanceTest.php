<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\RefundToBalance;
use Iyzipay\Request\CreateRefundtoBalanceRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class RefundToBalanceTest extends IyzipayResourceTestCase
{
    public function test_should_refund_to_balance()
    {
        $this->expectHttpPost();

        $refundToBalance = RefundToBalance::create(new CreateRefundToBalanceRequest(), $this->options);

        $this->verifyResource($refundToBalance);
    }
}