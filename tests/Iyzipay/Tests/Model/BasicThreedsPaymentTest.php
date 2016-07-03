<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\BasicThreedsPayment;
use Iyzipay\Request\CreateThreedsPaymentRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class BasicThreedsPaymentTest extends IyzipayResourceTestCase
{
    public function test_should_auth_connect_threeds()
    {
        $this->expectHttpPost();

        $basicThreedsPayment = BasicThreedsPayment::create(new CreateThreedsPaymentRequest(), $this->options);

        $this->verifyResource($basicThreedsPayment);
    }
}