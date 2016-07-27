<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\CardList;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\CardListMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class CardListMapperTest extends TestCase
{
    public function test_should_map_card_list()
    {
        $json = $this->retrieveJsonFile("retrieve-cards.json");

        $cardList = CardListMapper::create($json)->jsonDecode()->mapCardList(new CardList());

        $this->assertNotEmpty($cardList);
        $this->assertEquals(Status::FAILURE, $cardList->getStatus());
        $this->assertEquals("10000", $cardList->getErrorCode());
        $this->assertEquals("error message", $cardList->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $cardList->getErrorGroup());
        $this->assertEquals(Locale::TR, $cardList->getLocale());
        $this->assertEquals("1458545234852", $cardList->getSystemTime());
        $this->assertEquals("123456", $cardList->getConversationId());
        $this->assertEquals("cardUserKey", $cardList->getCardUserKey());
        $this->assertJson($cardList->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $cardList->getRawResult());

        $cardDetails = $cardList->getCardDetails();
        $this->assertNotEmpty($cardDetails);
        $this->assertEquals(2, count($cardDetails));

        $cardDetail = $cardDetails[0];
        $this->assertEquals("cardUserKey", $cardDetail->getCardUserKey());
        $this->assertEquals("cardToken", $cardDetail->getCardToken());
        $this->assertEquals("cardAlias", $cardDetail->getCardAlias());
        $this->assertEquals("554960", $cardDetail->getBinNumber());
        $this->assertEquals("CREDIT_CARD", $cardDetail->getCardType());
        $this->assertEquals("MASTER_CARD", $cardDetail->getCardAssociation());
        $this->assertEquals("Bonus", $cardDetail->getCardFamily());
        $this->assertEquals("10", $cardDetail->getCardBankCode());
        $this->assertEquals("Ziraat Bankası", $cardDetail->getCardBankName());

        $cardDetail2 = $cardDetails[1];
        $this->assertEquals("cardUserKey2", $cardDetail2->getCardUserKey());
        $this->assertEquals("cardToken2", $cardDetail2->getCardToken());
        $this->assertEquals("cardAlias2", $cardDetail2->getCardAlias());
        $this->assertEquals("554961", $cardDetail2->getBinNumber());
        $this->assertEquals("DEBIT_CARD", $cardDetail2->getCardType());
        $this->assertEquals("VISA", $cardDetail2->getCardAssociation());
        $this->assertEquals("Maximum", $cardDetail2->getCardFamily());
        $this->assertEquals("11", $cardDetail2->getCardBankCode());
        $this->assertEquals("Garanti Bankası", $cardDetail2->getCardBankName());
    }
}