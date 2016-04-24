<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\BinNumber;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\BinNumberMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class BinNumberMapperTest extends TestCase
{
    public function test_should_map_bin_number_given_bin_success_raw_result()
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
                "binNumber":"454671",
                "cardType":"CREDIT_CARD",
                "cardAssociation":"VISA",
                "cardFamily":"Ziraat Bankası CC",
                "bankName":"Ziraat Bankası",
                "bankCode":10
            }';

        $binNumber = BinNumberMapper::create($json)->jsonDecode()->mapBinNumber(new BinNumber());

        $this->assertNotEmpty($binNumber);
        $this->assertEquals(Status::SUCCESS, $binNumber->getStatus());
        $this->assertEmpty($binNumber->getErrorCode());
        $this->assertEmpty($binNumber->getErrorMessage());
        $this->assertEmpty($binNumber->getErrorGroup());
        $this->assertEquals(Locale::TR, $binNumber->getLocale());
        $this->assertEquals("1458545234852", $binNumber->getSystemTime());
        $this->assertEquals("123456", $binNumber->getConversationId());
        $this->assertJson($binNumber->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $binNumber->getRawResult());
        $this->assertEquals("454671", $binNumber->getBinNumber());
        $this->assertEquals("CREDIT_CARD", $binNumber->getCardType());
        $this->assertEquals("VISA", $binNumber->getCardAssociation());
        $this->assertEquals("Ziraat Bankası CC", $binNumber->getCardFamily());
        $this->assertEquals("Ziraat Bankası", $binNumber->getBankName());
        $this->assertEquals("10", $binNumber->getBankCode());
    }
    
    public function test_should_map_bin_number_given_bin_not_found_failue_raw_result()
    {
        $json = '
            {
                "status":"failure",
                "errorCode":"5066",
                "errorMessage":"Bin bulunamadı",
                "errorGroup":null,
                "locale":"tr",
                "systemTime":1458545234852,
                "conversationId":"123456",
                "binNumber":"000000",
                "cardType":null,
                "cardAssociation":null,
                "cardFamily":null,
                "bankName":null,
                "bankCode":null
            }';

        $binNumber = BinNumberMapper::create($json)->jsonDecode()->mapBinNumber(new BinNumber());

        $this->assertNotEmpty($binNumber);
        $this->assertEquals(Status::FAILURE, $binNumber->getStatus());
        $this->assertEquals("5066", $binNumber->getErrorCode());
        $this->assertEquals("Bin bulunamadı", $binNumber->getErrorMessage());
        $this->assertEmpty($binNumber->getErrorGroup());
        $this->assertEquals(Locale::TR, $binNumber->getLocale());
        $this->assertEquals("1458545234852", $binNumber->getSystemTime());
        $this->assertEquals("123456", $binNumber->getConversationId());
        $this->assertJson($binNumber->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $binNumber->getRawResult());
        $this->assertEquals("000000", $binNumber->getBinNumber());
        $this->assertEmpty($binNumber->getCardType());
        $this->assertEmpty($binNumber->getCardAssociation());
        $this->assertEmpty($binNumber->getCardFamily());
        $this->assertEmpty($binNumber->getBankName());
        $this->assertEmpty($binNumber->getBankCode());
    }
    
    public function test_should_map_bin_number_given_bin_should_be_six_digit_failure_raw_result()
    {
        $json = '
            {
                "status":"failure",
                "errorCode":"5007",
                "errorMessage":"binNumber 6 karakter olmalıdır",
                "errorGroup":null,
                "locale":"tr",
                "systemTime":"1458545234852",
                "conversationId":"123456",
                "binNumber":"12345",
                "cardType":null,
                "cardAssociation":null,
                "cardFamily":null,
                "bankName":null,
                "bankCode":null
            }';

        $binNumber = BinNumberMapper::create($json)->jsonDecode()->mapBinNumber(new BinNumber());

        $this->assertNotEmpty($binNumber);
        $this->assertEquals(Status::FAILURE, $binNumber->getStatus());
        $this->assertEquals("5007", $binNumber->getErrorCode());
        $this->assertEquals("binNumber 6 karakter olmalıdır", $binNumber->getErrorMessage());
        $this->assertEmpty($binNumber->getErrorGroup());
        $this->assertEquals(Locale::TR, $binNumber->getLocale());
        $this->assertEquals("1458545234852", $binNumber->getSystemTime());
        $this->assertEquals("123456", $binNumber->getConversationId());
        $this->assertJson($binNumber->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $binNumber->getRawResult());
        $this->assertEquals("12345", $binNumber->getBinNumber());
        $this->assertEmpty($binNumber->getCardType());
        $this->assertEmpty($binNumber->getCardAssociation());
        $this->assertEmpty($binNumber->getCardFamily());
        $this->assertEmpty($binNumber->getBankName());
        $this->assertEmpty($binNumber->getBankCode());
    }
}