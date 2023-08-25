<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Card;

class CardMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new CardMapper($rawResult);
    }

    public function mapCardFrom(Card $card, $jsonObject)
    {
        parent::mapResourceFrom($card, $jsonObject);

        if (isset($jsonObject->externalId)) {
            $card->setExternalId($jsonObject->externalId);
        }
        if (isset($jsonObject->email)) {
            $card->setEmail($jsonObject->email);
        }
        if (isset($jsonObject->cardUserKey)) {
            $card->setCardUserKey($jsonObject->cardUserKey);
        }
        if (isset($jsonObject->cardToken)) {
            $card->setCardToken($jsonObject->cardToken);
        }
        if (isset($jsonObject->cardAlias)) {
            $card->setCardAlias($jsonObject->cardAlias);
        }
        if (isset($jsonObject->binNumber)) {
            $card->setBinNumber($jsonObject->binNumber);
        }
        if (isset($jsonObject->lastFourDigits)) {
            $card->setLastFourDigits($jsonObject->lastFourDigits);
        }
        if (isset($jsonObject->cardType)) {
            $card->setCardType($jsonObject->cardType);
        }
        if (isset($jsonObject->cardAssociation)) {
            $card->setCardAssociation($jsonObject->cardAssociation);
        }
        if (isset($jsonObject->cardFamily)) {
            $card->setCardFamily($jsonObject->cardFamily);
        }
        if (isset($jsonObject->cardBankCode)) {
            $card->setCardBankCode($jsonObject->cardBankCode);
        }
        if (isset($jsonObject->cardBankName)) {
            $card->setCardBankName($jsonObject->cardBankName);
        }
        return $card;
    }

    public function mapCard(Card $card)
    {
        return $this->mapCardFrom($card, $this->jsonObject);
    }
}
