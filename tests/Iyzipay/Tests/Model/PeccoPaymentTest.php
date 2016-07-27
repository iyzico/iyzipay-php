<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\PeccoPayment;
use Iyzipay\Request\CreatePeccoPaymentRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class PeccoPaymentTest extends IyzipayResourceTestCase
{
    public function test_should_create_pecco_payment()
    {
        $this->expectHttpPost();

        $peccoPayment = PeccoPayment::create(new CreatePeccoPaymentRequest(), $this->options);

        $this->verifyResource($peccoPayment);
    }
}