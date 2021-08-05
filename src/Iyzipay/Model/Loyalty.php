<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\LoyaltyMapper;
use Iyzipay\Options;
use Iyzipay\Request\RetrieveLoyaltyRequest;

class Loyalty extends IyzipayResource
{
    public static function retrieve(RetrieveLoyaltyRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/loyalty/inquire", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return LoyaltyMapper::create($rawResult)->jsonDecode()->mapLoyalty(new Loyalty());
    }

    private $points;
    private $amount;
    private $cardBank;
    private $cardFamily;
    private $currency;

    public function getPoints()
    {
        return $this->points;
    }

    public function setPoints($points)
    {
        $this->points = $points;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function getCardBank()
    {
        return $this->cardBank;
    }

    public function setCardBank($cardBank)
    {
        $this->cardBank = $cardBank;
    }

    public function getCardFamily()
    {
        return $this->cardFamily;
    }

    public function setCardFamily($cardFamily)
    {
        $this->cardFamily = $cardFamily;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }
}