<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class RetrieveInstallmentInfoRequest extends Request
{
    private $binNumber;
    private $price;

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

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("binNumber", $this->getBinNumber())
            ->addPrice("price", $this->getPrice())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->append("binNumber", $this->getBinNumber())
            ->appendPrice("price", $this->getPrice())
            ->getRequestString();
    }
}