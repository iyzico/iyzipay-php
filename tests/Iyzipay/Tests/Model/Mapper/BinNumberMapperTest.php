<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\BinNumber;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\BinNumberMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class BinNumberMapperTest extends TestCase
{
    public function test_should_map_bin_number()
    {
        $json = $this->retrieveJsonFile("retrieve-bin-number.json");

        $binNumber = BinNumberMapper::create($json)->jsonDecode()->mapBinNumber(new BinNumber());

        $this->assertNotEmpty($binNumber);
        $this->assertEquals(Status::FAILURE, $binNumber->getStatus());
        $this->assertEquals("10000", $binNumber->getErrorCode());
        $this->assertEquals("error message", $binNumber->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $binNumber->getErrorGroup());
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
        $this->assertEquals("1", $binNumber->getCommercial());
    }
}