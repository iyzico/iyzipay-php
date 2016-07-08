<?php

namespace Iyzipay\Model;

class InstallmentDetail
{
    private $binNumber;
    private $price;
    private $cardType;
    private $cardAssociation;
    private $cardFamilyName;
    private $force3ds;
    private $bankCode;
    private $bankName;
    private $forceCvc;
    private $installmentPrices;

    public function getBinNumber()
    {
        return $this->binNumber;
    }

    public function setBinNumber($binNumber)
    {
        $this->binNumber = $binNumber;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
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

    public function getCardFamilyName()
    {
        return $this->cardFamilyName;
    }

    public function setCardFamilyName($cardFamilyName)
    {
        $this->cardFamilyName = $cardFamilyName;
    }

    public function getForce3ds()
    {
        return $this->force3ds;
    }

    public function setForce3ds($force3ds)
    {
        $this->force3ds = $force3ds;
    }

    public function getBankCode()
    {
        return $this->bankCode;
    }

    public function setBankCode($bankCode)
    {
        $this->bankCode = $bankCode;
    }

    public function getBankName()
    {
        return $this->bankName;
    }

    public function setBankName($bankName)
    {
        $this->bankName = $bankName;
    }

    public function getForceCvc()
    {
        return $this->forceCvc;
    }

    public function setForceCvc($forceCvc)
    {
        $this->forceCvc = $forceCvc;
    }

    public function getInstallmentPrices()
    {
        return $this->installmentPrices;
    }

    public function setInstallmentPrices($installmentPrices)
    {
        $this->installmentPrices = $installmentPrices;
    }
}