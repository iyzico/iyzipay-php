<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\BasicThreedsInitializePreAuth;
use Iyzipay\Request\CreateBasicPaymentRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class BasicThreedsInitializePreAuthTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_connect_threeds()
    {
        $this->expectHttpPost();

        $basicThreedsInitializePreAuth = BasicThreedsInitializePreAuth::create(new CreateBasicPaymentRequest(), $this->options);

        $this->verifyResource($basicThreedsInitializePreAuth);
    }
}