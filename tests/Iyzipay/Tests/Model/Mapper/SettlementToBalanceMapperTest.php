<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Mapper\RefundToBalanceMapper;
use Iyzipay\Model\Mapper\SettlementToBalanceMapper;
use Iyzipay\Model\RefundToBalance;
use Iyzipay\Model\SettlementToBalance;
use Iyzipay\Tests\TestCase;

class SettlementToBalanceMapperTest extends TestCase
{
    public function test_should_map_settlement_to_balance_mapper()
    {
        $json = $this->retrieveJsonFile("settlement_to_balance.json");

        $settlementToBalance = SettlementToBalanceMapper::create($json)->jsonDecode()->mapSettlementToBalance(new SettlementToBalance());

        $this->assertNotEmpty($settlementToBalance);
        $this->assertEquals("123456", $settlementToBalance->getToken());
        $this->assertEquals("https://url", $settlementToBalance->getUrl());
        $this->assertEquals("434343", $settlementToBalance->getSettingsAllTime());
        $this->assertEquals("failure", $settlementToBalance->getStatus());
        $this->assertEquals("10000", $settlementToBalance->getErrorCode());
        $this->assertEquals("error_message", $settlementToBalance->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $settlementToBalance->getErrorGroup());
        $this->assertEquals("1458545234852", $settlementToBalance->getSystemTime());
        $this->assertEquals("tr", $settlementToBalance->getLocale());
        $this->assertEquals("123456", $settlementToBalance->getConversationId());
        $this->assertJson($settlementToBalance->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $settlementToBalance->getRawResult());

    }
}