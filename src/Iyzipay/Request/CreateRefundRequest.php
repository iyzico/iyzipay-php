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
    private $reason;
    private $description;

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

    public function getReason()
    {
        return $this->reason;
    }

    public function setReason($reason)
    {
        $this->reason = $reason;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("paymentTransactionId", $this->getPaymentTransactionId())
            ->addPrice("price", $this->getPrice())
            ->add("ip", $this->getIp())
            ->add("currency", $this->getCurrency())
            ->add("reason", $this->getReason())
            ->add("description", $this->getDescription())
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
            ->append("reason", $this->getReason())
            ->append("description", $this->getDescription())
            ->getRequestString();
    }
}