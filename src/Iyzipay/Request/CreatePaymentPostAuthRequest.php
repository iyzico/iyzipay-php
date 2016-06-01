<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class CreatePaymentPostAuthRequest extends Request
{
    private $paymentId;
    private $paidPrice;
    private $ip;
    private $currency;

    public function getPaymentId()
    {
        return $this->paymentId;
    }

    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
    }

    public function getPaidPrice()
    {
        return $this->paidPrice;
    }

    public function setPaidPrice($paidPrice)
    {
        $this->paidPrice = $paidPrice;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function setIp($ip)
    {
        $this->ip = $ip;
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
            ->add("paymentId", $this->getPaymentId())
            ->add("ip", $this->getIp())
            ->addPrice("paidPrice", $this->getPaidPrice())
            ->add("currency", $this->getCurrency())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->append("paymentId", $this->getPaymentId())
            ->append("ip", $this->getIp())
            ->appendPrice("paidPrice", $this->getPaidPrice())
            ->append("currency", $this->getCurrency())
            ->getRequestString();
    }
}