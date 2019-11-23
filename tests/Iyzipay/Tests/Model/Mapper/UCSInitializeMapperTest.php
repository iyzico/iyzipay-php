<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Mapper\UCSInitializeMapper;
use Iyzipay\Model\UCSInitialize;
use Iyzipay\Tests\TestCase;

class UCSInitializeMapperTest extends TestCase
{
    public function test_should_map_ucs_init_mapper()
    {
        $json = $this->retrieveJsonFile("ucs_response.json");
        $details = UCSInitializeMapper::create($json)->jsonDecode()->mapUCSInitialize(new UCSInitialize());

        $this->assertNotEmpty($details);
        $this->assertEquals("cc2e2c06-7172-2fd2-8b0e-078c16de6adc", $details->getUcsToken());
        $this->assertEquals(false, $details->getBuyerProtectedConsumer());
        $this->assertEquals(false, $details->getBuyerProtectedMerchant());
        $this->assertEquals("+905555555555", $details->getGsmNumber());
        $this->assertEquals("+90********55", $details->getMaskedGsmNumber());
        $this->assertEquals("iyzico.com", $details->getMerchantName());
        $this->assertEquals("script", $details->getScript());
        $this->assertEquals("CONSUMER_WITH_CARD_EXIST", $details->getScriptType());
        $this->assertEquals("success", $details->getStatus());
        $this->assertEquals(null, $details->getErrorCode());
        $this->assertEquals(null, $details->getErrorMessage());
        $this->assertEquals(null, $details->getErrorGroup());
        $this->assertEquals("1574519824302", $details->getSystemTime());
        $this->assertJson($details->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $details->getRawResult());
    }
}