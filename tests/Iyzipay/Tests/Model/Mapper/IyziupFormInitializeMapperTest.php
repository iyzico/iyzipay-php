<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\IyziupFormInitialize;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\IyziupFormInitializeMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class IyziupFormInitializeMapperTest extends TestCase
{
    public function test_should_map_iyziup_form_initialize()
    {
        $json = $this->retrieveJsonFile("initialize-iyziup-form.json");

        $iyziupFormInitialize = IyziupFormInitializeMapper::create($json)->jsonDecode()->mapIyziupFormInitialize(new IyziupFormInitialize());

        $this->assertNotEmpty($iyziupFormInitialize);
        $this->assertEquals(Status::FAILURE, $iyziupFormInitialize->getStatus());
        $this->assertEquals("10000", $iyziupFormInitialize->getErrorCode());
        $this->assertEquals("error message", $iyziupFormInitialize->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $iyziupFormInitialize->getErrorGroup());
        $this->assertEquals(Locale::TR, $iyziupFormInitialize->getLocale());
        $this->assertEquals("1458545234852", $iyziupFormInitialize->getSystemTime());
        $this->assertEquals("123456", $iyziupFormInitialize->getConversationId());
        $this->assertEquals("token", $iyziupFormInitialize->getToken());
        $this->assertEquals("content", $iyziupFormInitialize->getContent());
        $this->assertEquals("3600", $iyziupFormInitialize->getTokenExpireTime());
        $this->assertJson($iyziupFormInitialize->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $iyziupFormInitialize->getRawResult());
    }
}