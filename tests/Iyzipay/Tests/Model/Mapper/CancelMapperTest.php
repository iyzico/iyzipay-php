<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Cancel;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\CancelMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class CancelMapperTest extends TestCase
{
    public function test_should_map_cancel_given_cancel_success_raw_result()
    {
        $json = '
            {
                "status":"success",
                "errorCode":null,
                "errorMessage":null,
                "errorGroup":null,
                "locale":"tr",
                "systemTime":"1458545234852",
                "conversationId":"123456",
                "paymentId":"1",
                "price":"1",
                "currency":"TRY",
                "connectorName":"connector name"
            }';

        $cancel = CancelMapper::create($json)->jsonDecode()->mapCancel(new Cancel());

        $this->assertNotEmpty($cancel);
        $this->assertEquals(Status::SUCCESS, $cancel->getStatus());
        $this->assertEmpty($cancel->getErrorCode());
        $this->assertEmpty($cancel->getErrorMessage());
        $this->assertEmpty($cancel->getErrorGroup());
        $this->assertEquals(Locale::TR, $cancel->getLocale());
        $this->assertEquals("1458545234852", $cancel->getSystemTime());
        $this->assertEquals("123456", $cancel->getConversationId());
        $this->assertJson($cancel->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $cancel->getRawResult());
        $this->assertEquals("1", $cancel->getPaymentId());
        $this->assertEquals("1", $cancel->getPrice());
        $this->assertEquals("TRY", $cancel->getCurrency());
        $this->assertEquals("connector name", $cancel->getConnectorName());
    }

    public function test_should_map_cancel_given_cancel_failure_raw_result()
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
                "price":"1",
                "currency":"TRY"
            }';

        $cancel = CancelMapper::create($json)->jsonDecode()->mapCancel(new Cancel());

        $this->assertNotEmpty($cancel);
        $this->assertEquals(Status::FAILURE, $cancel->getStatus());
        $this->assertEquals("10000", $cancel->getErrorCode());
        $this->assertEquals("error message", $cancel->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $cancel->getErrorGroup());
        $this->assertEquals(Locale::TR, $cancel->getLocale());
        $this->assertEquals("1458545234852", $cancel->getSystemTime());
        $this->assertEquals("123456", $cancel->getConversationId());
        $this->assertJson($cancel->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $cancel->getRawResult());
        $this->assertEquals("1", $cancel->getPaymentId());
        $this->assertEquals("1", $cancel->getPrice());
        $this->assertEquals("TRY", $cancel->getCurrency());
    }
}