<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class CreateBasicBkmInitializeRequest extends Request
{
    private $connectorName;
    private $price;
    private $callbackUrl;
    private $buyerEmail;
    private $buyerId;
    private $buyerIp;
    private $posOrderId;
    private $installmentDetails;

    public function getConnectorName()
    {
        return $this->connectorName;
    }

    public function setConnectorName($connectorName)
    {
        $this->connectorName = $connectorName;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }

    public function setCallbackUrl($callbackUrl)
    {
        $this->callbackUrl = $callbackUrl;
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

    public function getInstallmentDetails()
    {
        return $this->installmentDetails;
    }

    public function setInstallmentDetails($installmentDetails)
    {
        $this->installmentDetails = $installmentDetails;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("connectorName", $this->getConnectorName())
            ->addPrice("price", $this->getPrice())
            ->add("callbackUrl", $this->getCallbackUrl())
            ->add("buyerEmail", $this->getBuyerEmail())
            ->add("buyerId", $this->getBuyerId())
            ->add("buyerIp", $this->getBuyerIp())
            ->add("posOrderId", $this->getPosOrderId())
            ->addArray("installmentDetails", $this->getInstallmentDetails())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->append("connectorName", $this->getConnectorName())
            ->appendPrice("price", $this->getPrice())
            ->append("callbackUrl", $this->getCallbackUrl())
            ->append("buyerEmail", $this->getBuyerEmail())
            ->append("buyerId", $this->getBuyerId())
            ->append("buyerIp", $this->getBuyerIp())
            ->append("posOrderId", $this->getPosOrderId())
            ->appendArray("installmentDetails", $this->getInstallmentDetails())
            ->getRequestString();
    }
}