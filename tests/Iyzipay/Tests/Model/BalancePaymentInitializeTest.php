<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\BalancePaymentInitialize;
use Iyzipay\Request\CreateBalancePaymentInitializeRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class BalancePaymentInitializeTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_balance_payment()
    {
        $this->expectHttpPost();

        $balancePaymentInitialize = BalancePaymentInitialize::create(new CreateBalancePaymentInitializeRequest(), $this->options);

        $this->verifyResource($balancePaymentInitialize);
    }
}