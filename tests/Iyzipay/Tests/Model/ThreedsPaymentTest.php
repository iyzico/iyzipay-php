<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\ThreedsPayment;
use Iyzipay\Request\CreateThreedsPaymentRequest;
use Iyzipay\Request\RetrievePaymentRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ThreedsPaymentTest extends IyzipayResourceTestCase
{
    public function test_should_auth_threeds()
    {
        $this->expectHttpPost();

        $threeDSAuth = ThreedsPayment::create(new CreateThreedsPaymentRequest(), $this->options);

        $this->verifyResource($threeDSAuth);
    }

    public function test_should_retrieve_threeds()
    {
        $this->expectHttpPost();

        $threeDSAuth = ThreedsPayment::retrieve(new RetrievePaymentRequest(), $this->options);

        $this->verifyResource($threeDSAuth);
    }
}