<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\AmountBaseRefund;
use Iyzipay\Request\AmountBaseRefundRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class AmountBaseRefundTest extends IyzipayResourceTestCase {
    public function TestShouldCreateAmountBaseRefund(): void {
        $this->expectHttpPost();
        $amountBaseRefund = AmountBaseRefund::create(new AmountBaseRefundRequest(), $this->options);
        $this->verifyResource($amountBaseRefund);
    }
}
