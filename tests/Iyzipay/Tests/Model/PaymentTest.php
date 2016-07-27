<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\Payment;
use Iyzipay\Request\CreatePaymentRequest;
use Iyzipay\Request\RetrievePaymentRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class PaymentTest extends IyzipayResourceTestCase
{
    public function test_should_create_payment()
    {
        $this->expectHttpPost();

        $payment = Payment::create(new CreatePaymentRequest(), $this->options);

        $this->verifyResource($payment);
    }

    public function test_should_retrieve_payment()
    {
        $this->expectHttpPost();

        $payment = Payment::retrieve(new RetrievePaymentRequest(), $this->options);

        $this->verifyResource($payment);
    }
}