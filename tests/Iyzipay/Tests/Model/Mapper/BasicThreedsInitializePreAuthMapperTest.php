<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\BasicThreedsInitializePreAuth;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\BasicThreedsInitializePreAuthMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class BasicBasicThreedsInitializePreAuthMapperTest extends TestCase
{
    public function test_should_map_basic_threeds_initialize_pre_auth()
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

        $threedsInitializePreAuth = BasicThreedsInitializePreAuthMapper::create($json)->jsonDecode()->mapBasicThreedsInitializePreAuth(new BasicThreedsInitializePreAuth());

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