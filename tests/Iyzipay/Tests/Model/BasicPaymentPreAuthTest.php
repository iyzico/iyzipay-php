<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\BasicPaymentPreAuth;
use Iyzipay\Request\CreateBasicPaymentRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class BasicPaymentPreAuthTest extends IyzipayResourceTestCase
{
    public function test_should_pre_auth_connect_payment()
    {
        $this->expectHttpPost();

        $connectPaymentPreAuth = BasicPaymentPreAuth::create(new CreateBasicPaymentRequest(), $this->options);

        $this->verifyResource($connectPaymentPreAuth);
    }
}