<?php

namespace Iyzipay\Model;

use Iyzipay\JsonBuilder;
use Iyzipay\RequestStringBuilder;

class BKMInstallment
{
    private $bankId;
    private $installmentPrices;

    public function getBankId()
    {
        return $this->bankId;
    }

    public function setBankId($bankId)
    {
        $this->bankId = $bankId;
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
            ->add("bankId", $this->getBankId())
            ->add("installmentPrices", $this->getInstallmentPrices())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::newInstance()
            ->append("bankId", $this->getBankId())
            ->append("installmentPrices", $this->getInstallmentPrices())
            ->getRequestString();
    }
}