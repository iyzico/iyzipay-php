<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\PaymentPreAuth;
use Iyzipay\Request\CreatePaymentRequest;
use Iyzipay\Request\RetrievePaymentRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class PaymentAuthPreTest extends IyzipayResourceTestCase
{
    public function test_should_pre_auth_payment()
    {
        $this->expectHttpPost();

        $paymentPreAuth = PaymentPreAuth::create(new CreatePaymentRequest(), $this->options);

        $this->verifyResource($paymentPreAuth);
    }

    public function test_should_retrieve_pre_auth_payment()
    {
        $this->expectHttpPost();

        $paymentPreAuth = PaymentPreAuth::retrieve(new RetrievePaymentRequest(), $this->options);

        $this->verifyResource($paymentPreAuth);
    }
}