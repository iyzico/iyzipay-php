<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class CreatePaymentRequest extends Request
{
    const SINGLE_INSTALLMENT = 1;

    private $price;
    private $paidPrice;
    private $installment;
    private $paymentChannel;
    private $basketId;
    private $paymentGroup;
    private $paymentCard;
    private $buyer;
    private $shippingAddress;
    private $billingAddress;
    private $basketItems;
    private $paymentSource;
    private $currency;
    private $posOrderId;
    private $connectorName;
    private $callbackUrl;

    public function __construct()
    {
        $this->setInstallment(CreatePaymentRequest::SINGLE_INSTALLMENT);
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

    public function getPaymentChannel()
    {
        return $this->paymentChannel;
    }

    public function setPaymentChannel($paymentChannel)
    {
        $this->paymentChannel = $paymentChannel;
    }

    public function getBasketId()
    {
        return $this->basketId;
    }

    public function setBasketId($basketId)
    {
        $this->basketId = $basketId;
    }

    public function getPaymentGroup()
    {
        return $this->paymentGroup;
    }

    public function setPaymentGroup($paymentGroup)
    {
        $this->paymentGroup = $paymentGroup;
    }

    public function getPaymentCard()
    {
        return $this->paymentCard;
    }

    public function setPaymentCard($paymentCard)
    {
        $this->paymentCard = $paymentCard;
    }

    public function getBuyer()
    {
        return $this->buyer;
    }

    public function setBuyer($buyer)
    {
        $this->buyer = $buyer;
    }

    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
    }

    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    public function setBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;
    }

    public function getBasketItems()
    {
        return $this->basketItems;
    }

    public function setBasketItems($basketItems)
    {
        $this->basketItems = $basketItems;
    }

    public function getPaymentSource()
    {
        return $this->paymentSource;
    }

    public function setPaymentSource($paymentSource)
    {
        $this->paymentSource = $paymentSource;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function getPosOrderId()
    {
        return $this->posOrderId;
    }

    public function setPosOrderId($posOrderId)
    {
        $this->posOrderId = $posOrderId;
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
            ->add("paymentChannel", $this->getPaymentChannel())
            ->add("basketId", $this->getBasketId())
            ->add("paymentGroup", $this->getPaymentGroup())
            ->add("paymentCard", $this->getPaymentCard())
            ->add("buyer", $this->getBuyer())
            ->add("shippingAddress", $this->getShippingAddress())
            ->add("billingAddress", $this->getBillingAddress())
            ->addArray("basketItems", $this->getBasketItems())
            ->add("paymentSource", $this->getPaymentSource())
            ->add("currency", $this->getCurrency())
            ->add("posOrderId", $this->getPosOrderId())
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
            ->append("paymentChannel", $this->getPaymentChannel())
            ->append("basketId", $this->getBasketId())
            ->append("paymentGroup", $this->getPaymentGroup())
            ->append("paymentCard", $this->getPaymentCard())
            ->append("buyer", $this->getBuyer())
            ->append("shippingAddress", $this->getShippingAddress())
            ->append("billingAddress", $this->getBillingAddress())
            ->appendArray("basketItems", $this->getBasketItems())
            ->append("paymentSource", $this->getPaymentSource())
            ->append("currency", $this->getCurrency())
            ->append("posOrderId", $this->getPosOrderId())
            ->append("connectorName", $this->getConnectorName())
            ->append("callbackUrl", $this->getCallbackUrl())
            ->getRequestString();
    }
}