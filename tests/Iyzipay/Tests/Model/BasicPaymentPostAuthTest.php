<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\BasicPaymentPostAuth;
use Iyzipay\Request\CreatePaymentPostAuthRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class BasicPaymentPostAuthTest extends IyzipayResourceTestCase
{
    public function test_should_post_auth_connect_payment()
    {
        $this->expectHttpPost();

        $connectPaymentPostAuth = BasicPaymentPostAuth::create(new CreatePaymentPostAuthRequest(), $this->options);

        $this->verifyResource($connectPaymentPostAuth);
    }
}