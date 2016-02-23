<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Card;

class CardMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new CardMapper();
    }

    public function mapCard(Card $card, $jsonResult)
    {
        parent::mapResource($card, $jsonResult);

        if (isset($jsonResult->externalId)) {
            $card->setExternalId($jsonResult->externalId);
        }
        if (isset($jsonResult->email)) {
            $card->setEmail($jsonResult->email);
        }
        if (isset($jsonResult->cardUserKey)) {
            $card->setCardUserKey($jsonResult->cardUserKey);
        }
        if (isset($jsonResult->cardToken)) {
            $card->setCardToken($jsonResult->cardToken);
        }
        if (isset($jsonResult->cardAlias)) {
            $card->setCardAlias($jsonResult->cardAlias);
        }
        if (isset($jsonResult->binNumber)) {
            $card->setBinNumber($jsonResult->binNumber);
        }
        if (isset($jsonResult->cardType)) {
            $card->setCardType($jsonResult->cardType);
        }
        if (isset($jsonResult->cardAssociation)) {
            $card->setCardAssociation($jsonResult->cardAssociation);
        }
        if (isset($jsonResult->cardFamily)) {
            $card->setCardFamily($jsonResult->cardFamily);
        }
        if (isset($jsonResult->cardBankCode)) {
            $card->setCardBankCode($jsonResult->cardBankCode);
        }
        if (isset($jsonResult->cardBankName)) {
            $card->setCardBankName($jsonResult->cardBankName);
        }
        return $card;
    }
}