<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Options;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class RetrieveLoyaltyRequest extends Request
{
    private $currency;
    private $paymentCard;

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function getPaymentCard()
    {
        return $this->paymentCard;
    }

    public function setPaymentCard($paymentCard)
    {
        $this->paymentCard = $paymentCard;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("paymentCard", $this->getPaymentCard())
            ->add("currency", $this->getCurrency())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->append("paymentCard", $this->getPaymentCard())
            ->append("currency", $this->getCurrency())
            ->getRequestString();
    }
}