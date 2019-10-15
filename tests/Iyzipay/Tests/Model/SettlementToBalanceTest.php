<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\SettlementToBalance;
use Iyzipay\Request\CreateSettlementToBalanceRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class SettlementToBalanceTest extends IyzipayResourceTestCase
{
    public function test_should_settlement_to_balance()
    {
        $this->expectHttpPost();

        $settlementToBalance = SettlementToBalance::create(new CreateSettlementToBalanceRequest(), $this->options);

        $this->verifyResource($settlementToBalance);
    }
}