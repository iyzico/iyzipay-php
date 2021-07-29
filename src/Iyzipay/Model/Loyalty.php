<?php


namespace Iyzipay\Model;


use Iyzipay\BaseModel;
use Iyzipay\IyzipayResource;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\LoyaltyMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateLoyaltyRequest;
use Iyzipay\Request\RetrieveLoyaltyRequest;
use Iyzipay\RequestStringBuilder;

class Loyalty extends IyzipayResource
{

    public static function retrieve(RetrieveLoyaltyRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/loyalty/inquire", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return LoyaltyMapper::create($rawResult)->jsonDecode()->mapLoyalty(new Loyalty());
        //return BinNumberMapper::create($rawResult)->jsonDecode()->mapBinNumber(new BinNumber());
    }

    private $points;
    private $amount;
    private $cardBank;
    private $cardFamily;
    private $currency;

    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param mixed $points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getCardBank()
    {
        return $this->cardBank;
    }

    /**
     * @param mixed $cardBank
     */
    public function setCardBank($cardBank)
    {
        $this->cardBank = $cardBank;
    }

    /**
     * @return mixed
     */
    public function getCardFamily()
    {
        return $this->cardFamily;
    }

    /**
     * @param mixed $cardFamily
     */
    public function setCardFamily($cardFamily)
    {
        $this->cardFamily = $cardFamily;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }




}