<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\BalancePayment;
use Iyzipay\Request\RetrieveBalancePaymentRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class BalancePaymentTest extends IyzipayResourceTestCase
{
    public function test_should_retrieve_balance_payment()
    {
        $this->expectHttpPost();

        $balancePayment = BalancePayment::retrieve(new RetrieveBalancePaymentRequest(), $this->options);

        $this->verifyResource($balancePayment);
    }
}