<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Loyalty;
use Iyzipay\Model\Mapper\LoyaltyMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class LoyaltyMapperTest extends TestCase
{
    public function test_should_map_loyalty()
    {
        $json = $this->retrieveJsonFile("retrieve-loyalty.json");

        $loyalty = LoyaltyMapper::create($json)->jsonDecode()->mapLoyalty(new Loyalty());

        $this->assertNotEmpty($loyalty);
        $this->assertEquals(Status::SUCCESS, $loyalty->getStatus());
        $this->assertEquals(Locale::TR, $loyalty->getLocale());
        $this->assertEquals("0", $loyalty->getSystemTime());
        $this->assertEquals("123456789", $loyalty->getConversationId());
        $this->assertEquals("1000", $loyalty->getPoints());
        $this->assertEquals("10.00", $loyalty->getAmount());
        $this->assertEquals("Yapı Kredi Bankası", $loyalty->getCardBank());
        $this->assertEquals("World", $loyalty->getCardFamily());
        $this->assertEquals(Currency::TL, $loyalty->getCurrency());
    }

}