<?php

namespace Iyzipay\Model\Mapper;

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
            $cardList->setCardDetails($jsonResult->cardDetails);
        }
        return $cardList;
    }
}