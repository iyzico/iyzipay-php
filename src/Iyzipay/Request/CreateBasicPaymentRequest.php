<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class CreateBasicPaymentRequest extends Request
{
    const SINGLE_INSTALLMENT = 1;

    private $price;
    private $paidPrice;
    private $installment;
    private $buyerEmail;
    private $buyerId;
    private $buyerIp;
    private $posOrderId;
    private $paymentCard;
    private $currency;
    private $connectorName;
    private $callbackUrl;

    public function __construct()
    {
        $this->setInstallment(CreateBasicPaymentRequest::SINGLE_INSTALLMENT);
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPaidPrice()
    {
        return $this->paidPrice;
    }

    public function setPaidPrice($paidPrice)
    {
        $this->paidPrice = $paidPrice;
    }

    public function getInstallment()
    {
        return $this->installment;
    }

    public function setInstallment($installment)
    {
        $this->installment = $installment;
    }

    public function getBuyerEmail()
    {
        return $this->buyerEmail;
    }

    public function setBuyerEmail($buyerEmail)
    {
        $this->buyerEmail = $buyerEmail;
    }

    public function getBuyerId()
    {
        return $this->buyerId;
    }

    public function setBuyerId($buyerId)
    {
        $this->buyerId = $buyerId;
    }

    public function getBuyerIp()
    {
        return $this->buyerIp;
    }

    public function setBuyerIp($buyerIp)
    {
        $this->buyerIp = $buyerIp;
    }

    public function getPosOrderId()
    {
        return $this->posOrderId;
    }

    public function setPosOrderId($posOrderId)
    {
        $this->posOrderId = $posOrderId;
    }

    public function getPaymentCard()
    {
        return $this->paymentCard;
    }

    public function setPaymentCard($paymentCard)
    {
        $this->paymentCard = $paymentCard;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function getConnectorName()
    {
        return $this->connectorName;
    }

    public function setConnectorName($connectorName)
    {
        $this->connectorName = $connectorName;
    }

    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }

    public function setCallbackUrl($callbackUrl)
    {
        $this->callbackUrl = $callbackUrl;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->addPrice("price", $this->getPrice())
            ->addPrice("paidPrice", $this->getPaidPrice())
            ->add("installment", $this->getInstallment())
            ->add("buyerEmail", $this->getBuyerEmail())
            ->add("buyerId", $this->getBuyerId())
            ->add("buyerIp", $this->getBuyerIp())
            ->add("posOrderId", $this->getPosOrderId())
            ->add("paymentCard", $this->getPaymentCard())
            ->add("currency", $this->getCurrency())
            ->add("connectorName", $this->getConnectorName())
            ->add("callbackUrl", $this->getCallbackUrl())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->appendPrice("price", $this->getPrice())
            ->appendPrice("paidPrice", $this->getPaidPrice())
            ->append("installment", $this->getInstallment())
            ->append("buyerEmail", $this->getBuyerEmail())
            ->append("buyerId", $this->getBuyerId())
            ->append("buyerIp", $this->getBuyerIp())
            ->append("posOrderId", $this->getPosOrderId())
            ->append("paymentCard", $this->getPaymentCard())
            ->append("currency", $this->getCurrency())
            ->append("connectorName", $this->getConnectorName())
            ->append("callbackUrl", $this->getCallbackUrl())
            ->getRequestString();
    }
}