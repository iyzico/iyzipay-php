<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\ThreedsInitializeMapper;
use Iyzipay\Model\Status;
use Iyzipay\Model\ThreedsInitialize;
use Iyzipay\Tests\TestCase;

class ThreedsInitializeMapperTest extends TestCase
{
    public function test_should_map_threeds_initialize()
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
                "threeDSHtmlContent": "aHRtbENvbnRlbnQ="
            }';

        $threedsInitialize = ThreedsInitializeMapper::create($json)->jsonDecode()->mapThreedsInitialize(new ThreedsInitialize());

        $this->assertNotEmpty($threedsInitialize);
        $this->assertEquals(Status::FAILURE, $threedsInitialize->getStatus());
        $this->assertEquals("10000", $threedsInitialize->getErrorCode());
        $this->assertEquals("error message", $threedsInitialize->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $threedsInitialize->getErrorGroup());
        $this->assertEquals(Locale::TR, $threedsInitialize->getLocale());
        $this->assertEquals("1458545234852", $threedsInitialize->getSystemTime());
        $this->assertEquals("123456", $threedsInitialize->getConversationId());
        $this->assertEquals("htmlContent", $threedsInitialize->getHtmlContent());
        $this->assertJson($threedsInitialize->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $threedsInitialize->getRawResult());
    }
}