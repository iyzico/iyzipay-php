<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\ThreedsInitializePreAuthMapper;
use Iyzipay\Model\Status;
use Iyzipay\Model\ThreedsInitializePreAuth;
use Iyzipay\Tests\TestCase;

class ThreedsInitializePreAuthMapperTest extends TestCase
{
    public function test_should_map_threeds_initialize_pre_auth()
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

        $threedsInitializePreAuth = ThreedsInitializePreAuthMapper::create($json)->jsonDecode()->mapThreedsInitializePreAuth(new ThreedsInitializePreAuth());

        $this->assertNotEmpty($threedsInitializePreAuth);
        $this->assertEquals(Status::FAILURE, $threedsInitializePreAuth->getStatus());
        $this->assertEquals("10000", $threedsInitializePreAuth->getErrorCode());
        $this->assertEquals("error message", $threedsInitializePreAuth->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $threedsInitializePreAuth->getErrorGroup());
        $this->assertEquals(Locale::TR, $threedsInitializePreAuth->getLocale());
        $this->assertEquals("1458545234852", $threedsInitializePreAuth->getSystemTime());
        $this->assertEquals("123456", $threedsInitializePreAuth->getConversationId());
        $this->assertEquals("htmlContent", $threedsInitializePreAuth->getHtmlContent());
        $this->assertJson($threedsInitializePreAuth->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $threedsInitializePreAuth->getRawResult());
    }
}