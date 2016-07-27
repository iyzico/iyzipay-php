<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Disapproval;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\DisapprovalMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class DisapprovalMapperTest extends TestCase
{
    public function test_should_map_disapproval()
    {
        $json = $this->retrieveJsonFile("approve.json");

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