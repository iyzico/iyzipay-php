<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\BasicBkmInitialize;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\BasicBkmInitializeMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class BasicBasicBkmInitializeMapperTest extends TestCase
{
    public function test_should_map_basic_bkm_initialize()
    {
        $json = $this->retrieveJsonFile("initialize-basic-bkm.json");

        $basicBkmInitialize = BasicBkmInitializeMapper::create($json)->jsonDecode()->mapBasicBkmInitialize(new BasicBkmInitialize());

        $this->assertNotEmpty($basicBkmInitialize);
        $this->assertEquals(Status::FAILURE, $basicBkmInitialize->getStatus());
        $this->assertEquals("10000", $basicBkmInitialize->getErrorCode());
        $this->assertEquals("error message", $basicBkmInitialize->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $basicBkmInitialize->getErrorGroup());
        $this->assertEquals(Locale::TR, $basicBkmInitialize->getLocale());
        $this->assertEquals("1458545234852", $basicBkmInitialize->getSystemTime());
        $this->assertEquals("123456", $basicBkmInitialize->getConversationId());
        $this->assertEquals("token", $basicBkmInitialize->getToken());
        $this->assertEquals("htmlContent", $basicBkmInitialize->getHtmlContent());
        $this->assertJson($basicBkmInitialize->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $basicBkmInitialize->getRawResult());
    }
}