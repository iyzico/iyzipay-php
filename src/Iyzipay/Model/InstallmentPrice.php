<?php

namespace Iyzipay\Model;

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
}