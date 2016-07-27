<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\InstallmentHtml;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\InstallmentHtmlMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class InstallmentHtmlMapperTest extends TestCase
{
    public function test_should_map_installment_html()
    {
        $json = $this->retrieveJsonFile("retrieve-installment-info-html.json");

        $installmentHtml = InstallmentHtmlMapper::create($json)->jsonDecode()->mapInstallmentHtml(new InstallmentHtml());

        $this->assertNotEmpty($installmentHtml);
        $this->assertEquals(Status::FAILURE, $installmentHtml->getStatus());
        $this->assertEquals("10000", $installmentHtml->getErrorCode());
        $this->assertEquals("error message", $installmentHtml->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $installmentHtml->getErrorGroup());
        $this->assertEquals(Locale::TR, $installmentHtml->getLocale());
        $this->assertEquals("1458545234852", $installmentHtml->getSystemTime());
        $this->assertEquals("123456", $installmentHtml->getConversationId());
        $this->assertEquals("html", $installmentHtml->getHtmlContent());
        $this->assertJson($installmentHtml->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $installmentHtml->getRawResult());
    }
}