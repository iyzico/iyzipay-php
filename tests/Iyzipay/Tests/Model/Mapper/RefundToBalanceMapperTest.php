<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Mapper\RefundToBalanceMapper;
use Iyzipay\Model\RefundToBalance;
use Iyzipay\Tests\TestCase;

class RefundToBalanceMapperTest extends TestCase
{
    public function test_should_map_refund_to_balance_mapper()
    {
        $json = $this->retrieveJsonFile("refund_to_balance.json");

        $refundToBalance = RefundToBalanceMapper::create($json)->jsonDecode()->mapRefundToBalance(new RefundToBalance());


        $this->assertNotEmpty($refundToBalance);
        $this->assertEquals("123456", $refundToBalance->getToken());
        $this->assertEquals("https://url", $refundToBalance->getUrl());
        $this->assertEquals("", $refundToBalance->getStatus());
        $this->assertEquals("", $refundToBalance->getErrorCode());
        $this->assertEquals("", $refundToBalance->getErrorMessage());
        $this->assertEquals("", $refundToBalance->getErrorGroup());
        $this->assertEquals("", $refundToBalance->getSystemTime());
        $this->assertEquals("", $refundToBalance->getLocale());
        $this->assertEquals("", $refundToBalance->getConversationId());

    }
}