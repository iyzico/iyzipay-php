<?php

namespace Iyzipay\Model;

use Iyzipay\JsonBuilder;
use Iyzipay\RequestStringBuilder;

class BKMInstallmentPrice
{
    private $installmentNumber;
    private $totalPrice;

    public function getInstallmentNumber()
    {
        return $this->installmentNumber;
    }

    public function setInstallmentNumber($installmentNumber)
    {
        $this->installmentNumber = $installmentNumber;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }

    public function getJsonObject()
    {
        return JsonBuilder::create()
            ->add("installmentNumber", $this->getInstallmentNumber())
            ->add("totalPrice", $this->getTotalPrice())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::newInstance()
            ->append("installmentNumber", $this->getInstallmentNumber())
            ->append("totalPrice", $this->getTotalPrice())
            ->getRequestString();
    }
}