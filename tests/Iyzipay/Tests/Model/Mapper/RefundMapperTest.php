<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\RefundMapper;
use Iyzipay\Model\Refund;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class RefundMapperTest extends TestCase
{
    public function test_should_map_refund()
    {
        $json = '
            {
                "status":"failure",
                "errorCode":10000,
                "errorMessage":"error message",
                "errorGroup":"ERROR_GROUP",
                "locale":"tr",
                "systemTime":"1458545234852",
                "conversationId":"123456",
                "paymentId":"1",
                "paymentTransactionId":"1",
                "price":"1",
                "currency":"TRY",
                "connectorName":"connector name"
            }';

        $refund = RefundMapper::create($json)->jsonDecode()->mapRefund(new Refund());

        $this->assertNotEmpty($refund);
        $this->assertEquals(Status::FAILURE, $refund->getStatus());
        $this->assertEquals("10000", $refund->getErrorCode());
        $this->assertEquals("error message", $refund->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $refund->getErrorGroup());
        $this->assertEquals(Locale::TR, $refund->getLocale());
        $this->assertEquals("1458545234852", $refund->getSystemTime());
        $this->assertEquals("123456", $refund->getConversationId());
        $this->assertJson($refund->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $refund->getRawResult());
        $this->assertEquals("1", $refund->getPaymentId());
        $this->assertEquals("1", $refund->getPaymentTransactionId());
        $this->assertEquals("1", $refund->getPrice());
        $this->assertEquals("TRY", $refund->getCurrency());
        $this->assertEquals("connector name", $refund->getConnectorName());
    }
}