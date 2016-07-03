<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\ThreedsInitialize;
use Iyzipay\Request\CreatePaymentRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ThreedsInitializeTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_threeds()
    {
        $this->expectHttpPost();

        $threedsInitialize = ThreedsInitialize::create(new CreatePaymentRequest(), $this->options);

        $this->verifyResource($threedsInitialize);
    }
}
