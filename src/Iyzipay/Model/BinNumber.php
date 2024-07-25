<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\BinNumberMapper;
use Iyzipay\Options;
use Iyzipay\Request\RetrieveBinNumberRequest;

class BinNumber extends IyzipayResource
{
    private $binNumber;
    private $cardType;
    private $cardAssociation;
    private $cardFamily;
    private $bankName;
    private $bankCode;
    private $commercial;

    public static function retrieve(RetrieveBinNumberRequest $request, Options $options)
    {
        $url = "/payment/bin/check";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $url, parent::getHttpHeadersV2($url, $request, $options), $request->toJsonString());
        return BinNumberMapper::create($rawResult)->jsonDecode()->mapBinNumber(new BinNumber());
    }

    public function getBinNumber()
    {
        return $this->binNumber;
    }

    public function setBinNumber($binNumber)
    {
        $this->binNumber = $binNumber;
    }

    public function getCardType()
    {
        return $this->cardType;
    }

    public function setCardType($cardType)
    {
        $this->cardType = $cardType;
    }

    public function getCardAssociation()
    {
        return $this->cardAssociation;
    }

    public function setCardAssociation($cardAssociation)
    {
        $this->cardAssociation = $cardAssociation;
    }

    public function getCardFamily()
    {
        return $this->cardFamily;
    }

    public function setCardFamily($cardFamily)
    {
        $this->cardFamily = $cardFamily;
    }

    public function getBankName()
    {
        return $this->bankName;
    }

    public function setBankName($bankName)
    {
        $this->bankName = $bankName;
    }

    public function getBankCode()
    {
        return $this->bankCode;
    }

    public function setBankCode($bankCode)
    {
        $this->bankCode = $bankCode;
    }

    public function getCommercial()
    {
        return $this->commercial;
    }

    public function setCommercial($commercial)
    {
        $this->commercial = $commercial;
    }
}