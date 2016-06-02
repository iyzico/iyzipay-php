<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\BkmInitialize;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\BkmInitializeMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class BkmInitializeMapperTest extends TestCase
{
    public function test_should_map_BKM_Initialize_number_success_raw_result()
    {
        $json = '
            {   
                "status":"success",
                "errorCode":null,
                "errorMessage":null,
                "errorGroup":null,
                "locale":"tr",
                "systemTime":"1458545234852",
                "conversationId":"123456",
                "htmlContent":"html content",
                "token":"token"
            }';

        $BKMInitialize = BkmInitializeMapper::create($json)->jsonDecode()->mapBKMInitialize(new BkmInitialize());

        $this->assertNotEmpty($BKMInitialize);
        $this->assertEquals(Status::SUCCESS, $BKMInitialize->getStatus());
        $this->assertEmpty($BKMInitialize->getErrorCode());
        $this->assertEmpty($BKMInitialize->getErrorMessage());
        $this->assertEmpty($BKMInitialize->getErrorGroup());
        $this->assertEquals(Locale::TR, $BKMInitialize->getLocale());
        $this->assertEquals("1458545234852", $BKMInitialize->getSystemTime());
        $this->assertEquals("123456", $BKMInitialize->getConversationId());
        $this->assertJson($BKMInitialize->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $BKMInitialize->getRawResult());
        $this->assertEquals(base64_decode("html content"), $BKMInitialize->getHtmlContent());
        $this->assertEquals("token", $BKMInitialize->getToken());
    }
}
