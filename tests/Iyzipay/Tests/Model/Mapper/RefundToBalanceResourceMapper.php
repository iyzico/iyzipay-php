<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Mapper\RefundToBalanceResourceMapper;
use Iyzipay\Model\RefundToBalanceResource;
use Iyzipay\Tests\TestCase;

class RefundToBalanceResourceMapperTest extends TestCase
{
    public function test_should_map_refund_to_balance_resource_mapper()
    {
        $json = $this->retrieveJsonFile("refund_to_balance.json");

        $refundToBalance = RefundToBalanceResourceMapper::create($json)->jsonDecode()->mapRefundToBalanceResource(new RefundToBalanceResource());

        $this->assertNotEmpty($refundToBalance);
        $this->assertEquals("123456", $refundToBalance->getToken());
        $this->assertEquals("https://url", $refundToBalance->getUrl());

    }
}