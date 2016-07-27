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
        $json = $this->retrieveJsonFile("initialize-basic-threeds-payment.json");

        $basicThreedsInitializePreAuth = BasicThreedsInitializePreAuthMapper::create($json)->jsonDecode()->mapBasicThreedsInitializePreAuth(new BasicThreedsInitializePreAuth());

        $this->assertNotEmpty($basicThreedsInitializePreAuth);
        $this->assertEquals(Status::FAILURE, $basicThreedsInitializePreAuth->getStatus());
        $this->assertEquals("10000", $basicThreedsInitializePreAuth->getErrorCode());
        $this->assertEquals("error message", $basicThreedsInitializePreAuth->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $basicThreedsInitializePreAuth->getErrorGroup());
        $this->assertEquals(Locale::TR, $basicThreedsInitializePreAuth->getLocale());
        $this->assertEquals("1458545234852", $basicThreedsInitializePreAuth->getSystemTime());
        $this->assertEquals("123456", $basicThreedsInitializePreAuth->getConversationId());
        $this->assertEquals("htmlContent", $basicThreedsInitializePreAuth->getHtmlContent());
        $this->assertJson($basicThreedsInitializePreAuth->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $basicThreedsInitializePreAuth->getRawResult());
    }
}