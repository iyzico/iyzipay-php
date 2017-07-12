<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class CreateApmInitializeRequest extends Request
{
    private $price;
    private $paidPrice;
    private $paymentChannel;
    private $paymentGroup;
    private $paymentSource;
    private $currency;
    private $merchantOrderId;
    private $countryCode;
    private $accountHolderName;
    private $merchantCallbackUrl;
    private $merchantErrorUrl;
    private $merchantNotificationUrl;
    private $apmType;
    private $basketId;
    private $buyer;
    private $shippingAddress;
    private $billingAddress;
    private $basketItems;

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

    public function getPaymentChannel()
    {
        return $this->paymentChannel;
    }

    public function setPaymentChannel($paymentChannel)
    {
        $this->paymentChannel = $paymentChannel;
    }

    public function getPaymentGroup()
    {
        return $this->paymentGroup;
    }

    public function setPaymentGroup($paymentGroup)
    {
        $this->paymentGroup = $paymentGroup;
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

    public function getMerchantOrderId()
    {
        return $this->merchantOrderId;
    }

    public function setMerchantOrderId($merchantOrderId)
    {
        $this->merchantOrderId = $merchantOrderId;
    }

    public function getCountryCode()
    {
        return $this->countryCode;
    }

    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    public function getAccountHolderName()
    {
        return $this->accountHolderName;
    }

    public function setAccountHolderName($accountHolderName)
    {
        $this->accountHolderName = $accountHolderName;
    }

    public function getMerchantCallbackUrl()
    {
        return $this->merchantCallbackUrl;
    }

    public function setMerchantCallbackUrl($merchantCallbackUrl)
    {
        $this->merchantCallbackUrl = $merchantCallbackUrl;
    }

    public function getMerchantErrorUrl()
    {
        return $this->merchantErrorUrl;
    }

    public function setMerchantErrorUrl($merchantErrorUrl)
    {
        $this->merchantErrorUrl = $merchantErrorUrl;
    }

    public function getMerchantNotificationUrl()
    {
        return $this->merchantNotificationUrl;
    }

    public function setMerchantNotificationUrl($merchantNotificationUrl)
    {
        $this->merchantNotificationUrl = $merchantNotificationUrl;
    }

    public function getApmType()
    {
        return $this->apmType;
    }

    public function setApmType($apmType)
    {
        $this->apmType = $apmType;
    }

    public function getBasketId()
    {
        return $this->basketId;
    }

    public function setBasketId($basketId)
    {
        $this->basketId = $basketId;
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

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->addPrice("price", $this->getPrice())
            ->addPrice("paidPrice", $this->getPaidPrice())
            ->add("paymentChannel", $this->getPaymentChannel())
            ->add("paymentGroup", $this->getPaymentGroup())
            ->add("paymentSource", $this->getPaymentSource())
            ->add("currency", $this->getCurrency())
            ->add("merchantOrderId", $this->getMerchantOrderId())
            ->add("countryCode", $this->getCountryCode())
            ->add("accountHolderName", $this->getAccountHolderName())
            ->add("merchantCallbackUrl", $this->getMerchantCallbackUrl())
            ->add("merchantErrorUrl", $this->getMerchantErrorUrl())
            ->add("merchantNotificationUrl", $this->getMerchantNotificationUrl())
            ->add("apmType", $this->getApmType())
            ->add("basketId", $this->getBasketId())
            ->add("buyer", $this->getBuyer())
            ->add("shippingAddress", $this->getShippingAddress())
            ->add("billingAddress", $this->getBillingAddress())
            ->addArray("basketItems", $this->getBasketItems())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->appendPrice("price", $this->getPrice())
            ->appendPrice("paidPrice", $this->getPaidPrice())
            ->append("paymentChannel", $this->getPaymentChannel())
            ->append("paymentGroup", $this->getPaymentGroup())
            ->append("paymentSource", $this->getPaymentSource())
            ->append("currency", $this->getCurrency())
            ->append("merchantOrderId", $this->getMerchantOrderId())
            ->append("countryCode", $this->getCountryCode())
            ->append("accountHolderName", $this->getAccountHolderName())
            ->append("merchantCallbackUrl", $this->getMerchantCallbackUrl())
            ->append("merchantErrorUrl", $this->getMerchantErrorUrl())
            ->append("merchantNotificationUrl", $this->getMerchantNotificationUrl())
            ->append("apmType", $this->getApmType())
            ->append("basketId", $this->getBasketId())
            ->append("buyer", $this->getBuyer())
            ->append("shippingAddress", $this->getShippingAddress())
            ->append("billingAddress", $this->getBillingAddress())
            ->appendArray("basketItems", $this->getBasketItems())
            ->getRequestString();
    }
}