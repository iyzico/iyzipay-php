<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\BalancePaymentInitialize;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\BalancePaymentInitializeMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class BalancePaymentInitializeMapperTest extends TestCase
{
    public function test_should_map_balance_payment_initialize()
    {
        $json = $this->retrieveJsonFile("initialize-balance-payment.json");

        $balancePaymentInitialize = BalancePaymentInitializeMapper::create($json)->jsonDecode()->mapBalancePaymentInitialize(new BalancePaymentInitialize());

        $this->assertNotEmpty($balancePaymentInitialize);
        $this->assertEquals(Status::FAILURE, $balancePaymentInitialize->getStatus());
        $this->assertEquals("10000", $balancePaymentInitialize->getErrorCode());
        $this->assertEquals("error message", $balancePaymentInitialize->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $balancePaymentInitialize->getErrorGroup());
        $this->assertEquals(Locale::TR, $balancePaymentInitialize->getLocale());
        $this->assertEquals("1458545234852", $balancePaymentInitialize->getSystemTime());
        $this->assertEquals("123456", $balancePaymentInitialize->getConversationId());
        $this->assertEquals("token", $balancePaymentInitialize->getToken());
        $this->assertEquals("balancePaymentContent", $balancePaymentInitialize->getCheckoutFormContent());
        $this->assertEquals("3600", $balancePaymentInitialize->getTokenExpireTime());
        $this->assertEquals("url", $balancePaymentInitialize->getPaymentPageUrl());
        $this->assertJson($balancePaymentInitialize->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $balancePaymentInitialize->getRawResult());
    }
}