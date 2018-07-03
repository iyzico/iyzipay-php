<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\ProtectedOverlayScript;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\ProtectedOverlayScriptMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class ProtectedOverlayScriptMapperTest extends TestCase
{
    public function test_should_map_protected_Overlay_script_mapper()
    {
        $json = $this->retrieveJsonFile("retrieve-protected-Overlay-script.json");

        $protectedOverlayScript = ProtectedOverlayScriptMapper::create($json)->jsonDecode()->mapProtectedOverlayScript(new ProtectedOverlayScript());

        $this->assertNotEmpty($protectedOverlayScript);
        $this->assertEquals(Status::FAILURE, $protectedOverlayScript->getStatus());
        $this->assertEquals("10000", $protectedOverlayScript->getErrorCode());
        $this->assertEquals("error message", $protectedOverlayScript->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $protectedOverlayScript->getErrorGroup());
        $this->assertEquals(Locale::TR, $protectedOverlayScript->getLocale());
        $this->assertEquals("1458545234852", $protectedOverlayScript->getSystemTime());
        $this->assertEquals("123456", $protectedOverlayScript->getConversationId());
        $this->assertJson($protectedOverlayScript->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $protectedOverlayScript->getRawResult());
        $this->assertEquals("protected shop id", $protectedOverlayScript->getProtectedShopId());
        $this->assertEquals("overlay script", $protectedOverlayScript->getOverlayScript());
    }
}