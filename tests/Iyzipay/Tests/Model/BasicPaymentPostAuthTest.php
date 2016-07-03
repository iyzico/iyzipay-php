<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\BasicPaymentPostAuth;
use Iyzipay\Request\CreatePaymentPostAuthRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class BasicPaymentPostAuthTest extends IyzipayResourceTestCase
{
    public function test_should_post_auth_basic_payment()
    {
        $this->expectHttpPost();

        $basicPaymentPostAuth = BasicPaymentPostAuth::create(new CreatePaymentPostAuthRequest(), $this->options);

        $this->verifyResource($basicPaymentPostAuth);
    }
}