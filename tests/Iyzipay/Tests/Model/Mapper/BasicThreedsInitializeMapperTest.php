<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\BasicThreedsInitialize;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\BasicThreedsInitializeMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class BasicBasicThreedsInitializeMapperTest extends TestCase
{
    public function test_should_map_basic_threeds_initialize()
    {
        $json = $this->retrieveJsonFile("initialize-basic-threeds-payment.json");

        $basicThreedsInitialize = BasicThreedsInitializeMapper::create($json)->jsonDecode()->mapBasicThreedsInitialize(new BasicThreedsInitialize());

        $this->assertNotEmpty($basicThreedsInitialize);
        $this->assertEquals(Status::FAILURE, $basicThreedsInitialize->getStatus());
        $this->assertEquals("10000", $basicThreedsInitialize->getErrorCode());
        $this->assertEquals("error message", $basicThreedsInitialize->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $basicThreedsInitialize->getErrorGroup());
        $this->assertEquals(Locale::TR, $basicThreedsInitialize->getLocale());
        $this->assertEquals("1458545234852", $basicThreedsInitialize->getSystemTime());
        $this->assertEquals("123456", $basicThreedsInitialize->getConversationId());
        $this->assertEquals("htmlContent", $basicThreedsInitialize->getHtmlContent());
        $this->assertJson($basicThreedsInitialize->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $basicThreedsInitialize->getRawResult());
    }
}