<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Card;
use Iyzipay\Model\CardList;

class CardListMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new CardListMapper();
    }

    public function map(CardList $cardList, $jsonResult)
    {
        parent::map($cardList, $jsonResult);

        if (isset($jsonResult->cardUserKey)) {
            $cardList->setCardUserKey($jsonResult->cardUserKey);
        }
        if (isset($jsonResult->cardDetails)) {
            $cardList->setCardDetails($this->mapCardDetails($jsonResult->cardDetails));
        }
        return $cardList;
    }

    public function mapCardDetails($cardDetails)
    {
        $cards = array();

        foreach ($cardDetails as $index => $cardDetail) {
            $cards[$index] = CardMapper::create()->map(new Card(), $cardDetail);
        }
        return $cards;
    }
}