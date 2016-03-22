<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\ConnectPaymentAuth;
use Iyzipay\Request\CreateConnectPaymentRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ConnectPaymentAuthTest extends IyzipayResourceTestCase
{
    public function test_should_auth_connect_payment()
    {
        $this->expectHttpPost();

        $connectPaymentAuth = ConnectPaymentAuth::create(new CreateConnectPaymentRequest(), $this->options);

        $this->verifyResource($connectPaymentAuth);
    }
}