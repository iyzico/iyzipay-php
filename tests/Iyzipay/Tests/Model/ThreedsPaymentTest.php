<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\ThreedsPayment;
use Iyzipay\Request\CreateThreedsPaymentRequest;
use Iyzipay\Request\RetrievePaymentRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ThreedsPaymentTest extends IyzipayResourceTestCase
{
    public function test_should_create_threeds_payment()
    {
        $this->expectHttpPost();

        $threedsPayment = ThreedsPayment::create(new CreateThreedsPaymentRequest(), $this->options);

        $this->verifyResource($threedsPayment);
    }

    public function test_should_retrieve_threeds_payment()
    {
        $this->expectHttpPost();

        $threedsPayment = ThreedsPayment::retrieve(new RetrievePaymentRequest(), $this->options);

        $this->verifyResource($threedsPayment);
    }
}