<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\RefundToAmountBased;
use Iyzipay\Request\CreateRefundToAmountBasedRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class RefundToAmountBasedTest extends IyzipayResourceTestCase
{
    public function test_should_refund_to_amount_base()
    {
        $this->expectHttpPost();

        $refund = RefundToAmountBased::create(new CreateRefundToAmountBasedRequest(), $this->options);

        $this->verifyResource($refund);
    }
}