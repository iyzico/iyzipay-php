<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\ConnectPaymentPostAuth;
use Iyzipay\Request\CreatePaymentPostAuthRequest;

class ConnectPaymentAuthPostTest extends IyzipayResourceTestCase
{
    public function test_should_post_auth_connect_payment()
    {
        $this->expectHttpPost();

        $connectPaymentPostAuth = ConnectPaymentPostAuth::create(new CreatePaymentPostAuthRequest(), $this->options);

        $this->verifyResource($connectPaymentPostAuth);
    }
}