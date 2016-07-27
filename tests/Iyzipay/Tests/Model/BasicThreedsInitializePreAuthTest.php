<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\BasicThreedsInitializePreAuth;
use Iyzipay\Request\CreateBasicPaymentRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class BasicThreedsInitializePreAuthTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_basic_threeds_pre_auth()
    {
        $this->expectHttpPost();

        $basicThreedsInitializePreAuth = BasicThreedsInitializePreAuth::create(new CreateBasicPaymentRequest(), $this->options);

        $this->verifyResource($basicThreedsInitializePreAuth);
    }
}