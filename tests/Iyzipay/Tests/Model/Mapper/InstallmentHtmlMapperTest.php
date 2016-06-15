<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\InstallmentHtml;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\InstallmentHtmlMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class InstallmentHtmlMapperTest extends TestCase
{
    public function test_should_map_installment_html_given_price_success_raw_result()
    {
        $json = '
            {
                "status":"success",
                "errorCode":null,
                "errorMessage":null,
                "locale":"tr",
                "systemTime":1458545234852,
                "conversationId":"123456",
                "htmlContent":""
            }';

        $installmentHtml = InstallmentHtmlMapper::create($json)->jsonDecode()->mapInstallmentHtml(new InstallmentHtml());

        $this->assertNotEmpty($installmentHtml);
        $this->assertEquals(Status::SUCCESS, $installmentHtml->getStatus());
        $this->assertEmpty($installmentHtml->getErrorCode());
        $this->assertEmpty($installmentHtml->getErrorMessage());
        $this->assertEquals(Locale::TR, $installmentHtml->getLocale());
        $this->assertEquals("1458545234852", $installmentHtml->getSystemTime());
        $this->assertEquals("123456", $installmentHtml->getConversationId());
        $this->assertJson($installmentHtml->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $installmentHtml->getRawResult());
    }

    public function test_should_map_installment_html_price_should_be_set_failue_raw_result()
    {
        $json = '
            {
                "status":"failure",
                "errorCode":"5004",
                "errorMessage":"price gönderilmesi zorunludur",
                "locale":"tr",
                "systemTime":1458545234852,
                "conversationId":"123456",
                "htmlContent":null
            }';

        $installmentHtml = InstallmentHtmlMapper::create($json)->jsonDecode()->mapInstallmentHtml(new installmentHtml());

        $this->assertNotEmpty($installmentHtml);
        $this->assertEquals(Status::FAILURE, $installmentHtml->getStatus());
        $this->assertEquals("5004", $installmentHtml->getErrorCode());
        $this->assertEquals("price gönderilmesi zorunludur", $installmentHtml->getErrorMessage());
        $this->assertEquals(Locale::TR, $installmentHtml->getLocale());
        $this->assertEquals("1458545234852", $installmentHtml->getSystemTime());
        $this->assertEquals("123456", $installmentHtml->getConversationId());
        $this->assertJson($installmentHtml->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $installmentHtml->getRawResult());
    }
}