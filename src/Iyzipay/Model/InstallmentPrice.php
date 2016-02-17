<?php

namespace Iyzipay\Model;

use Iyzipay\JsonBuilder;
use Iyzipay\RequestStringBuilder;

class InstallmentPrice
{
    private $installmentPrice;
    private $totalPrice;
    private $installmentNumber;

    public function getInstallmentPrice()
    {
        return $this->installmentPrice;
    }

    public function setInstallmentPrice($installmentPrice)
    {
        $this->installmentPrice = $installmentPrice;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }

    public function getInstallmentNumber()
    {
        return $this->installmentNumber;
    }

    public function setInstallmentNumber($installmentNumber)
    {
        $this->installmentNumber = $installmentNumber;
    }

    public function getJsonObject()
    {
        return JsonBuilder::create()
            ->addPrice("installmentPrice", $this->getInstallmentPrice())
            ->addPrice("totalPrice", $this->getTotalPrice())
            ->add("installmentNumber", $this->getInstallmentNumber())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::newInstance()
            ->appendPrice("installmentPrice", $this->getInstallmentPrice())
            ->appendPrice("totalPrice", $this->getTotalPrice())
            ->append("installmentNumber", $this->getInstallmentNumber())
            ->getRequestString();
    }
}