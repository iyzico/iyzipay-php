<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\Refund;
use Iyzipay\Request\CreateRefundRequest;

class RefundTest extends IyzipayResourceTestCase
{
    public function test_should_refund()
    {
        $this->expectHttpPost();

        $refund = Refund::create(new CreateRefundRequest(), $this->options);

        $this->verifyResource($refund);
    }
}