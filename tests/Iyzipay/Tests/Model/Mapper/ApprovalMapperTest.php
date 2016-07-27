<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Approval;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\ApprovalMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class ApprovalMapperTest extends TestCase
{
    public function test_should_map_approval()
    {
        $json = $this->retrieveJsonFile("approve.json");

        $approval = ApprovalMapper::create($json)->jsonDecode()->mapApproval(new Approval());

        $this->assertNotEmpty($approval);
        $this->assertEquals(Status::FAILURE, $approval->getStatus());
        $this->assertEquals("10000", $approval->getErrorCode());
        $this->assertEquals("error message", $approval->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $approval->getErrorGroup());
        $this->assertEquals(Locale::TR, $approval->getLocale());
        $this->assertEquals("1458545234852", $approval->getSystemTime());
        $this->assertEquals("123456", $approval->getConversationId());
        $this->assertJson($approval->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $approval->getRawResult());
        $this->assertEquals("1", $approval->getPaymentTransactionId());
    }
}