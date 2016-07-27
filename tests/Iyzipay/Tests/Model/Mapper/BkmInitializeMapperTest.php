<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\BkmInitialize;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\BkmInitializeMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class BkmInitializeMapperTest extends TestCase
{
    public function test_should_map_bkm_initialize()
    {
        $json = $this->retrieveJsonFile("initialize-bkm.json");

        $bkmInitialize = BkmInitializeMapper::create($json)->jsonDecode()->mapBkmInitialize(new BkmInitialize());

        $this->assertNotEmpty($bkmInitialize);
        $this->assertEquals(Status::FAILURE, $bkmInitialize->getStatus());
        $this->assertEquals("10000", $bkmInitialize->getErrorCode());
        $this->assertEquals("error message", $bkmInitialize->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $bkmInitialize->getErrorGroup());
        $this->assertEquals(Locale::TR, $bkmInitialize->getLocale());
        $this->assertEquals("1458545234852", $bkmInitialize->getSystemTime());
        $this->assertEquals("123456", $bkmInitialize->getConversationId());
        $this->assertJson($bkmInitialize->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $bkmInitialize->getRawResult());
        $this->assertEquals(base64_decode("html content"), $bkmInitialize->getHtmlContent());
        $this->assertEquals("token", $bkmInitialize->getToken());
    }
}
