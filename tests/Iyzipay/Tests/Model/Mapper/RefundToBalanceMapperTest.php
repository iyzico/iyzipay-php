<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Mapper\RefundToBalanceMapper;
use Iyzipay\Model\RefundToBalance;
use Iyzipay\Tests\TestCase;

class RefundToBalanceMapperTest extends TestCase
{
    public function test_should_map_refund()
    {
        $json = $this->retrieveJsonFile("refund_to_balance.json");

        $refund = RefundToBalanceMapper::create($json)->jsonDecode()->mapRefundToBalance(new RefundToBalance());


        $this->assertNotEmpty($refund);
        $this->assertEquals("123456", $refund->getToken());
        $this->assertEquals("url", $refund->getUrl());

    }
}