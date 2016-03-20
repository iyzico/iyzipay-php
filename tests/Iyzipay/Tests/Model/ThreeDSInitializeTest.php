<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\ThreeDSInitialize;
use Iyzipay\Request\CreateThreeDSInitializeRequest;

class ThreeDSInitializeTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_threeds()
    {
        $this->expectHttpPost();

        $threeDSInitialize = ThreeDSInitialize::create(new CreateThreeDSInitializeRequest(), $this->options);

        $this->verifyResource($threeDSInitialize);
    }
}