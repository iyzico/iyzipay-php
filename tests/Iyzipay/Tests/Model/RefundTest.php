<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\Refund;
use Iyzipay\Request\CreateRefundRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class RefundTest extends IyzipayResourceTestCase
{
    public function test_should_refund()
    {
        $this->expectHttpPost();

        $refund = Refund::create(new CreateRefundRequest(), $this->options);

        $this->verifyResource($refund);
    }
}