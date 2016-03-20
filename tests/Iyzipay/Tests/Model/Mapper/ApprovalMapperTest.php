<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\ApprovalMapper;
use Iyzipay\Tests\TestCase;

class ApprovalMapperTest extends TestCase
{
    public function test_should_map_approval_given_approve_failure_raw_result()
    {
        $json = '
            {
                "status":"success",
                "errorCode":null,
                "errorMessage":null,
                "errorGroup":null,
                "locale":"tr",
                "systemTime":"1458467793",
                "conversationId":"123456",
                "paymentTransactionId":"1"
            }';

        $approval = ApprovalMapper::create($json)->jsonDecode()->mapApproval(new Approval());

        $this->assertNotEmpty($approval);
        $this->assertEquals(Status::SUCCESS, $approval->getStatus());
        $this->assertEmpty($approval->getErrorCode());
        $this->assertEmpty($approval->getErrorMessage());
        $this->assertEmpty($approval->getErrorGroup());
        $this->assertEquals(Locale::TR, $approval->getLocale());
        $this->assertEquals("1458467793", $approval->getSystemTime());
        $this->assertEquals("123456", $approval->getConversationId());
        $this->assertEquals("1", $approval->getPaymentTransactionId());
        $this->assertJson($approval->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $approval->getRawResult());
    }

    public function test_should_map_approval_given_approve_success_raw_result()
    {
        $json = '
            {
                "status":"failure",
                "errorCode":100,
                "errorMessage":"error",
                "errorGroup":"error group",
                "locale":"tr",
                "systemTime":"1458467793",
                "conversationId":"123456",
                "paymentTransactionId":"1"
            }';

        $approval = ApprovalMapper::create($json)->jsonDecode()->mapApproval(new Approval());

        $this->assertNotEmpty($approval);
        $this->assertEquals(Status::FAILURE, $approval->getStatus());
        $this->assertEquals("100", $approval->getErrorCode());
        $this->assertEquals("error", $approval->getErrorMessage());
        $this->assertEquals("error group", $approval->getErrorGroup());
        $this->assertEquals(Locale::TR, $approval->getLocale());
        $this->assertEquals("1458467793", $approval->getSystemTime());
        $this->assertEquals("123456", $approval->getConversationId());
        $this->assertEquals("1", $approval->getPaymentTransactionId());
        $this->assertJson($approval->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $approval->getRawResult());
    }
}