<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\ThreeDSAuth;
use Iyzipay\Request\CreateThreeDSAuthRequest;
use Iyzipay\Request\RetrievePaymentRequest;

class ThreeDSAuthTest extends IyzipayResourceTestCase
{
    public function test_should_auth_threeds()
    {
        $this->expectHttpPost();

        $threeDSAuth = ThreeDSAuth::create(new CreateThreeDSAuthRequest(), $this->options);

        $this->verifyResource($threeDSAuth);
    }

    public function test_should_retrieve_threeds()
    {
        $this->expectHttpPost();

        $threeDSAuth = ThreeDSAuth::retrieve(new RetrievePaymentRequest(), $this->options);

        $this->verifyResource($threeDSAuth);
    }
}