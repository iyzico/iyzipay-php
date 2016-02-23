<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\IyzipayResource;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\CardListMapper;
use Iyzipay\Options;
use Iyzipay\Request\RetrieveCardListRequest;

class CardList extends IyzipayResource
{
    private $cardUserKey;
    private $cardDetails;

    public static function retrieve(RetrieveCardListRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/cardstorage/cards", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return CardListMapper::create()->mapCardList(new CardList(), JsonBuilder::jsonDecode($rawResult));
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