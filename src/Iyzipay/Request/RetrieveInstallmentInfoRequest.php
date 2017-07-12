<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class RetrieveInstallmentInfoRequest extends Request
{
    private $binNumber;
    private $price;
    private $currency;

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

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("binNumber", $this->getBinNumber())
            ->addPrice("price", $this->getPrice())
            ->add("currency", $this->getCurrency())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->append("binNumber", $this->getBinNumber())
            ->appendPrice("price", $this->getPrice())
            ->append("currency", $this->getCurrency())
            ->getRequestString();
    }
}