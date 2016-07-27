<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\ThreedsInitializePreAuth;
use Iyzipay\Request\CreatePaymentRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ThreedsInitializePreAuthTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_threeds_pre_auth()
    {
        $this->expectHttpPost();

        $threedsInitializePreAuth = ThreedsInitializePreAuth::create(new CreatePaymentRequest(), $this->options);

        $this->verifyResource($threedsInitializePreAuth);
    }
}
