<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Mapper\RefundToBalanceResourceMapper;
use Iyzipay\Model\RefundToBalanceResource;
use Iyzipay\Tests\TestCase;

class RefundToBalanceResourceMapperTest extends TestCase
{
    public function test_should_map_refund_to_balance_resource_mapper()
    {
        $json = $this->retrieveJsonFile("refund.json");

        $refund = RefundToBalanceResourceMapper::create($json)->jsonDecode()->mapRefundToBalanceResource(new RefundToBalanceResource());

        $this->assertNotEmpty($refund);
        $this->assertEquals("", $refund->getToken());
        $this->assertEquals("", $refund->getUrl());

    }
}