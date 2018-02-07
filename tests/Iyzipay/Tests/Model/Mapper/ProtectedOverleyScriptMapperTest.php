<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\ProtectedOverleyScript;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\ProtectedOverleyScriptMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class ProtectedOverleyScriptMapperTest extends TestCase
{
    public function test_should_map_protected_overley_script_mapper()
    {
        $json = $this->retrieveJsonFile("retrieve-protected-overley-script.json");

        $protectedOverleyScript = ProtectedOverleyScriptMapper::create($json)->jsonDecode()->mapProtectedOverleyScript(new ProtectedOverleyScript());

        $this->assertNotEmpty($protectedOverleyScript);
        $this->assertEquals(Status::FAILURE, $protectedOverleyScript->getStatus());
        $this->assertEquals("10000", $protectedOverleyScript->getErrorCode());
        $this->assertEquals("error message", $protectedOverleyScript->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $protectedOverleyScript->getErrorGroup());
        $this->assertEquals(Locale::TR, $protectedOverleyScript->getLocale());
        $this->assertEquals("1458545234852", $protectedOverleyScript->getSystemTime());
        $this->assertEquals("123456", $protectedOverleyScript->getConversationId());
        $this->assertJson($protectedOverleyScript->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $protectedOverleyScript->getRawResult());
        $this->assertEquals("protected shop id", $protectedOverleyScript->getProtectedShopId());
        $this->assertEquals("overlay script", $protectedOverleyScript->getOverlayScript());
    }
}