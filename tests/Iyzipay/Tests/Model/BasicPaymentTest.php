<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\BasicPayment;
use Iyzipay\Request\CreateBasicPaymentRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class BasicPaymentTest extends IyzipayResourceTestCase
{
    public function test_should_create_basic_payment()
    {
        $this->expectHttpPost();

        $basicPayment = BasicPayment::create(new CreateBasicPaymentRequest(), $this->options);

        $this->verifyResource($basicPayment);
    }
}