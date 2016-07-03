<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\RefundChargedFromMerchant;
use Iyzipay\Request\CreateRefundRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class RefundChargedFromMerchantTest extends IyzipayResourceTestCase
{
    public function test_should_refund_charged_from_merchant()
    {
        $this->expectHttpPost();

        $refundChargedFromMerchant = RefundChargedFromMerchant::create(new CreateRefundRequest(), $this->options);

        $this->verifyResource($refundChargedFromMerchant);
    }
}