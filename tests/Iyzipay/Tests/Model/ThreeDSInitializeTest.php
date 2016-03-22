<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\ThreeDSInitialize;
use Iyzipay\Request\CreateThreeDSInitializeRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ThreeDSInitializeTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_threeds()
    {
        $this->expectHttpPost();

        $threeDSInitialize = ThreeDSInitialize::create(new CreateThreeDSInitializeRequest(), $this->options);

        $this->verifyResource($threeDSInitialize);
    }
}