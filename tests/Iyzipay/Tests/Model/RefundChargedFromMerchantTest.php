<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\RefundChargedFromMerchant;
use Iyzipay\Request\CreateRefundRequest;

class RefundChargedFromMerchantTest extends IyzipayResourceTestCase
{
    public function test_should_refund_charged_from_merchant()
    {
        $this->expectHttpPost();

        $refund = RefundChargedFromMerchant::create(new CreateRefundRequest(), $this->options);

        $this->verifyResource($refund);
    }
}