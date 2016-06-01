<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class CreateRefundRequest extends Request
{
    private $paymentTransactionId;
    private $price;
    private $ip;
    private $currency;

    public function getPaymentTransactionId()
    {
        return $this->paymentTransactionId;
    }

    public function setPaymentTransactionId($paymentTransactionId)
    {
        $this->paymentTransactionId = $paymentTransactionId;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
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
            ->add("paymentTransactionId", $this->getPaymentTransactionId())
            ->addPrice("price", $this->getPrice())
            ->add("ip", $this->getIp())
            ->add("currency", $this->getCurrency())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->append("paymentTransactionId", $this->getPaymentTransactionId())
            ->appendPrice("price", $this->getPrice())
            ->append("ip", $this->getIp())
            ->append("currency", $this->getCurrency())
            ->getRequestString();
    }
}