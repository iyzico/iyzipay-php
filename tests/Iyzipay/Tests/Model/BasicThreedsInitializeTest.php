<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\BasicThreedsInitialize;
use Iyzipay\Request\CreateBasicPaymentRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class BasicThreedsInitializeTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_connect_threeds()
    {
        $this->expectHttpPost();

        $connectThreeDSInitialize = BasicThreedsInitialize::create(new CreateBasicPaymentRequest(), $this->options);

        $this->verifyResource($connectThreeDSInitialize);
    }
}