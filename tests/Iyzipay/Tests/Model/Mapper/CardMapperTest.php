<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Card;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\CardMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class CardMapperTest extends TestCase
{
    public function test_should_map_card()
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
                "externalId": "123456",
                "email": "email",
                "cardUserKey": "cardUserKey",
                "cardToken": "cardToken",
                "cardAlias": "cardAlias",
                "binNumber": "554960",
                "cardType": "CREDIT_CARD",
                "cardAssociation": "MASTER_CARD",
                "cardFamily": "Bonus",
                "cardBankCode":10,
                "cardBankName":"Ziraat Bankası"
            }';

        $card = CardMapper::create($json)->jsonDecode()->mapCard(new Card());

        $this->assertNotEmpty($card);
        $this->assertEquals(Status::FAILURE, $card->getStatus());
        $this->assertEquals("10000", $card->getErrorCode());
        $this->assertEquals("error message", $card->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $card->getErrorGroup());
        $this->assertEquals(Locale::TR, $card->getLocale());
        $this->assertEquals("1458545234852", $card->getSystemTime());
        $this->assertEquals("123456", $card->getConversationId());
        $this->assertEquals("123456", $card->getExternalId());
        $this->assertEquals("email", $card->getEmail());
        $this->assertEquals("cardUserKey", $card->getCardUserKey());
        $this->assertEquals("cardToken", $card->getCardToken());
        $this->assertEquals("cardAlias", $card->getCardAlias());
        $this->assertEquals("554960", $card->getBinNumber());
        $this->assertEquals("CREDIT_CARD", $card->getCardType());
        $this->assertEquals("MASTER_CARD", $card->getCardAssociation());
        $this->assertEquals("Bonus", $card->getCardFamily());
        $this->assertEquals("10", $card->getCardBankCode());
        $this->assertEquals("Ziraat Bankası", $card->getCardBankName());
        $this->assertJson($card->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $card->getRawResult());
    }
}