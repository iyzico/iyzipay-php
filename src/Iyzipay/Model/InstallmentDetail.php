<?php

namespace Iyzipay\Model;

use Iyzipay\JsonBuilder;
use Iyzipay\RequestStringBuilder;

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

    public function getInstallmentPrices()
    {
        return $this->installmentPrices;
    }

    public function setInstallmentPrices($installmentPrices)
    {
        $this->installmentPrices = $installmentPrices;
    }

    public function getJsonObject()
    {
        return JsonBuilder::create()
            ->add("binNumber", $this->getBinNumber())
            ->addPrice("price", $this->getPrice())
            ->add("cardType", $this->getCardType())
            ->add("cardAssociation", $this->getCardAssociation())
            ->add("cardFamilyName", $this->getCardFamilyName())
            ->add("force3ds", $this->getForce3ds())
            ->add("bankCode", $this->getBankCode())
            ->add("bankName", $this->getBankName())
            ->addArray("installmentPrices", $this->getInstallmentPrices())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::newInstance()
            ->append("binNumber", $this->getBinNumber())
            ->appendPrice("price", $this->getPrice())
            ->append("cardType", $this->getCardType())
            ->append("cardAssociation", $this->getCardAssociation())
            ->append("cardFamilyName", $this->getCardFamilyName())
            ->append("force3ds", $this->getForce3ds())
            ->append("bankCode", $this->getBankCode())
            ->append("bankName", $this->getBankName())
            ->appendArray("installmentPrices", $this->getInstallmentPrices())
            ->getRequestString();
    }
}