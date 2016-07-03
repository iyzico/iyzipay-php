<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\BasicThreedsInitialize;
use Iyzipay\Request\CreateBasicPaymentRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class BasicThreedsInitializeTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_basic_threeds()
    {
        $this->expectHttpPost();

        $basicThreedsInitialize = BasicThreedsInitialize::create(new CreateBasicPaymentRequest(), $this->options);

        $this->verifyResource($basicThreedsInitialize);
    }
}