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
        $this->assertEquals("failure", $refundToBalance->getStatus());
        $this->assertEquals("10000", $refundToBalance->getErrorCode());
        $this->assertEquals("error_message", $refundToBalance->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $refundToBalance->getErrorGroup());
        $this->assertEquals("1458545234852", $refundToBalance->getSystemTime());
        $this->assertEquals("tr", $refundToBalance->getLocale());
        $this->assertEquals("123456", $refundToBalance->getConversationId());
        $this->assertJson($refundToBalance->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $refundToBalance->getRawResult());

    }
}