<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\PaymentAuth;
use Iyzipay\Request\CreatePaymentRequest;
use Iyzipay\Request\RetrievePaymentRequest;

class PaymentAuthTest extends IyzipayResourceTestCase
{
    public function test_should_auth_payment()
    {
        $this->expectHttpPost();

        $paymentAuth = PaymentAuth::create(new CreatePaymentRequest(), $this->options);

        $this->verifyResource($paymentAuth);
    }

    public function test_should_retrieve_auth_payment()
    {
        $this->expectHttpPost();

        $paymentAuth = PaymentAuth::retrieve(new RetrievePaymentRequest(), $this->options);

        $this->verifyResource($paymentAuth);
    }
}