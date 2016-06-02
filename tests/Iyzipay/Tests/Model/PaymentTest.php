<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\Payment;
use Iyzipay\Request\CreatePaymentRequest;
use Iyzipay\Request\RetrievePaymentRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class PaymentTest extends IyzipayResourceTestCase
{
    public function test_should_auth_payment()
    {
        $this->expectHttpPost();

        $paymentAuth = Payment::create(new CreatePaymentRequest(), $this->options);

        $this->verifyResource($paymentAuth);
    }

    public function test_should_retrieve_auth_payment()
    {
        $this->expectHttpPost();

        $paymentAuth = Payment::retrieve(new RetrievePaymentRequest(), $this->options);

        $this->verifyResource($paymentAuth);
    }
}