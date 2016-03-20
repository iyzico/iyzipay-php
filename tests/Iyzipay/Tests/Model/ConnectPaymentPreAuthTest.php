<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\ConnectPaymentPreAuth;
use Iyzipay\Request\CreateConnectPaymentRequest;

class ConnectPaymentPreAuthTest extends IyzipayResourceTestCase
{
    public function test_should_pre_auth_connect_payment()
    {
        $this->expectHttpPost();

        $connectPaymentPreAuth = ConnectPaymentPreAuth::create(new CreateConnectPaymentRequest(), $this->options);

        $this->verifyResource($connectPaymentPreAuth);
    }
}