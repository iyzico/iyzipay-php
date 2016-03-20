<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\ConnectPaymentAuth;
use Iyzipay\Request\CreateConnectPaymentRequest;

class ConnectPaymentAuthTest extends IyzipayResourceTestCase
{
    public function test_should_auth_connect_payment()
    {
        $this->expectHttpPost();

        $connectPaymentAuth = ConnectPaymentAuth::create(new CreateConnectPaymentRequest(), $this->options);

        $this->verifyResource($connectPaymentAuth);
    }
}