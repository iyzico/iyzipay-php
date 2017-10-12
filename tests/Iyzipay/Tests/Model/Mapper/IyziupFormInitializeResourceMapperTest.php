<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\IyziupFormInitializeResource;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\IyziupFormInitializeResourceMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class IyziupFormInitializeResourceMapperTest extends TestCase
{
    public function test_should_map_checkout_form_initialize_resource()
    {
        $json = $this->retrieveJsonFile("initialize-iyziup-form.json");

        $iyziupFormInitialize = IyziupFormInitializeResourceMapper::create($json)->jsonDecode()->mapIyziupFormInitializeResource(new IyziupFormInitializeResource());

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