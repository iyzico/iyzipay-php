<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\ThreeDSInitializePreAuth;
use Iyzipay\Request\CreateThreeDSInitializeRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ThreeDSInitializePreAuthTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_threeds()
    {
        $this->expectHttpPost();

        $threeDSInitializePreAuth = ThreeDSInitializePreAuth::create(new CreateThreeDSInitializeRequest(), $this->options);

        $this->verifyResource($threeDSInitializePreAuth);
    }
}