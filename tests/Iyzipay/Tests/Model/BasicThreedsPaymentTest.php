<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\BasicThreedsPayment;
use Iyzipay\Request\CreateThreedsPaymentRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class BasicThreedsPaymentTest extends IyzipayResourceTestCase
{
    public function test_should_create_basic_threeds_payment()
    {
        $this->expectHttpPost();

        $basicThreedsPayment = BasicThreedsPayment::create(new CreateThreedsPaymentRequest(), $this->options);

        $this->verifyResource($basicThreedsPayment);
    }
}