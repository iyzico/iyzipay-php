<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\PeccoInitializeMapper;
use Iyzipay\Model\PeccoInitialize;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class PeccoInitializeMapperTest extends TestCase
{
    public function test_should_map_pecco_initialize()
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
                "token": "token",
                "htmlContent": "htmlContent",
                "tokenExpireTime": "3600",
                "redirectUrl": "url"
            }';

        $peccoInitialize = PeccoInitializeMapper::create($json)->jsonDecode()->mapPeccoInitialize(new PeccoInitialize());

        $this->assertNotEmpty($peccoInitialize);
        $this->assertEquals(Status::FAILURE, $peccoInitialize->getStatus());
        $this->assertEquals("10000", $peccoInitialize->getErrorCode());
        $this->assertEquals("error message", $peccoInitialize->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $peccoInitialize->getErrorGroup());
        $this->assertEquals(Locale::TR, $peccoInitialize->getLocale());
        $this->assertEquals("1458545234852", $peccoInitialize->getSystemTime());
        $this->assertEquals("123456", $peccoInitialize->getConversationId());
        $this->assertEquals("token", $peccoInitialize->getToken());
        $this->assertEquals("htmlContent", $peccoInitialize->getHtmlContent());
        $this->assertEquals("3600", $peccoInitialize->getTokenExpireTime());
        $this->assertEquals("url", $peccoInitialize->getRedirectUrl());
        $this->assertJson($peccoInitialize->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $peccoInitialize->getRawResult());
    }
}