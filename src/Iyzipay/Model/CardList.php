<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\CardListMapper;
use Iyzipay\Options;
use Iyzipay\Request\RetrieveCardListRequest;

class CardList extends IyzipayResource
{
    private $cardUserKey;
    private $cardDetails;

    public static function retrieve(RetrieveCardListRequest $request, Options $options)
    {
        $url = "/cardstorage/cards";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $url, parent::getHttpHeadersV2($url, $request, $options), $request->toJsonString());
        return CardListMapper::create($rawResult)->jsonDecode()->mapCardList(new CardList());
    }

    public function getCardUserKey()
    {
        return $this->cardUserKey;
    }

    public function setCardUserKey($cardUserKey)
    {
        $this->cardUserKey = $cardUserKey;
    }

    public function getCardDetails()
    {
        return $this->cardDetails;
    }

    public function setCardDetails($cardDetails)
    {
        $this->cardDetails = $cardDetails;
    }
}