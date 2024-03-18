<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\BlacklistedCard;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\BlacklistedCardMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class BlacklistedCardMapperTest extends TestCase {
    public function test_should_map_blacklisted_card() {
        $json = $this->retrieveJsonFile('blacklisted-card.json');

        $blacklistedCard = BlacklistedCardMapper::create($json)->jsonDecode()->mapBlacklistedCard(new BlacklistedCard());

        $this->assertNotEmpty($blacklistedCard);
        $this->assertEquals(Status::FAILURE, $blacklistedCard->getStatus());
        $this->assertEquals("123456", $blacklistedCard->getConversationId());
        $this->assertEquals("10000", $blacklistedCard->getErrorCode());
        $this->assertEquals("error message", $blacklistedCard->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $blacklistedCard->getErrorGroup());
        $this->assertEquals(Locale::TR, $blacklistedCard->getLocale());
        $this->assertEquals("1458545234852", $blacklistedCard->getSystemTime());
        $this->assertEquals("cardUserKey", $blacklistedCard->getCardUserKey());
        $this->assertEquals("cardToken", $blacklistedCard->getCardToken());
    }

    public function test_should_map_retrieve_blacklisted_card() {
        $json = $this->retrieveJsonFile('retrieve-blacklisted-card.json');

        $blacklistedCard = BlacklistedCardMapper::create($json)->jsonDecode()->mapRetrieveBlacklistedCard(new BlacklistedCard());

        $this->assertEquals(Status::FAILURE, $blacklistedCard->getStatus());
        $this->assertEquals("123456", $blacklistedCard->getConversationId());
        $this->assertEquals("10000", $blacklistedCard->getErrorCode());
        $this->assertEquals("error message", $blacklistedCard->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $blacklistedCard->getErrorGroup());
        $this->assertEquals(Locale::TR, $blacklistedCard->getLocale());
        $this->assertEquals("1458545234852", $blacklistedCard->getSystemTime());
        $this->assertEquals("cardNumber", $blacklistedCard->getCardNumber());
    }
}
