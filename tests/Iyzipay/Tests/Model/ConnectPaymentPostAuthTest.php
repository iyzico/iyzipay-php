<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\ConnectPaymentPostAuth;
use Iyzipay\Request\CreatePaymentPostAuthRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ConnectPaymentAuthPostTest extends IyzipayResourceTestCase
{
    public function test_should_post_auth_connect_payment()
    {
        $this->expectHttpPost();

        $connectPaymentPostAuth = ConnectPaymentPostAuth::create(new CreatePaymentPostAuthRequest(), $this->options);

        $this->verifyResource($connectPaymentPostAuth);
    }
}