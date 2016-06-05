<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Disapproval;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\DisapprovalMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class DisapprovalMapperTest extends TestCase
{
    public function test_should_map_disapproval_given_disapprove_failure_raw_result()
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
                "paymentTransactionId":"1"
            }';

        $disapproval = DisapprovalMapper::create($json)->jsonDecode()->mapDisapproval(new Disapproval());

        $this->assertNotEmpty($disapproval);
        $this->assertEquals(Status::SUCCESS, $disapproval->getStatus());
        $this->assertEmpty($disapproval->getErrorCode());
        $this->assertEmpty($disapproval->getErrorMessage());
        $this->assertEmpty($disapproval->getErrorGroup());
        $this->assertEquals(Locale::TR, $disapproval->getLocale());
        $this->assertEquals("1458545234852", $disapproval->getSystemTime());
        $this->assertEquals("123456", $disapproval->getConversationId());
        $this->assertJson($disapproval->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $disapproval->getRawResult());
        $this->assertEquals("1", $disapproval->getPaymentTransactionId());
    }

    public function test_should_map_disapproval_given_disapprove_success_raw_result()
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
                "paymentTransactionId":"1"
            }';

        $disapproval = DisapprovalMapper::create($json)->jsonDecode()->mapDisapproval(new Disapproval());

        $this->assertNotEmpty($disapproval);
        $this->assertEquals(Status::FAILURE, $disapproval->getStatus());
        $this->assertEquals("10000", $disapproval->getErrorCode());
        $this->assertEquals("error message", $disapproval->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $disapproval->getErrorGroup());
        $this->assertEquals(Locale::TR, $disapproval->getLocale());
        $this->assertEquals("1458545234852", $disapproval->getSystemTime());
        $this->assertEquals("123456", $disapproval->getConversationId());
        $this->assertJson($disapproval->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $disapproval->getRawResult());
        $this->assertEquals("1", $disapproval->getPaymentTransactionId());
    }
}