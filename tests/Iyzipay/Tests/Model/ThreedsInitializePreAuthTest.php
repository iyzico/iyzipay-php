<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\ThreedsInitializePreAuth;
use Iyzipay\Request\CreatePaymentRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ThreedsInitializePreAuthTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_threeds()
    {
        $this->expectHttpPost();

        $threeDSInitializePreAuth = ThreedsInitializePreAuth::create(new CreatePaymentRequest(), $this->options);

        $this->verifyResource($threeDSInitializePreAuth);
    }
}
