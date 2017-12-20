<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class CreateIyziupFormInitializeRequest extends Request
{
    private $merchantOrderId;
    private $paymentGroup;
    private $paymentSource;
    private $forceThreeDS;
    private $enabledInstallments;
    private $enabledCardFamily;
    private $currency;
    private $price;
    private $paidPrice;
    private $shippingPrice;
    private $callbackUrl;
    private $termsUrl;
    private $preSalesContractUrl;
    private $orderItems;
    private $initialConsumer;

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

    public function getShippingPrice()
    {
        return $this->shippingPrice;
    }

    public function setShippingPrice($shippingPrice)
    {
        $this->shippingPrice = $shippingPrice;
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

    public function getOrderItems()
    {
        return $this->orderItems;
    }

    public function setOrderItems($orderItems)
    {
        $this->orderItems = $orderItems;
    }

    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }

    public function setCallbackUrl($callbackUrl)
    {
        $this->callbackUrl = $callbackUrl;
    }

    public function getTermsUrl()
    {
        return $this->termsUrl;
    }

    public function setTermsUrl($termsUrl)
    {
        $this->termsUrl = $termsUrl;
    }

    public function getPreSalesContractUrl()
    {
        return $this->preSalesContractUrl;
    }

    public function setPreSalesContractUrl($preSalesContractUrl)
    {
        $this->preSalesContractUrl = $preSalesContractUrl;
    }

    public function getForceThreeDS()
    {
        return $this->forceThreeDS;
    }

    public function setForceThreeDS($forceThreeDS)
    {
        $this->forceThreeDS = $forceThreeDS;
    }

    public function getMerchantOrderId()
    {
        return $this->merchantOrderId;
    }

    public function setMerchantOrderId($merchantOrderId)
    {
        $this->merchantOrderId = $merchantOrderId;
    }

    public function setEnabledInstallments($enabledInstallments)
    {
        $this->enabledInstallments = $enabledInstallments;
    }

    public function getEnabledInstallments()
    {
        return $this->enabledInstallments;
    }

    public function getEnabledCardFamily()
    {
        return $this->enabledCardFamily;
    }

    public function setEnabledCardFamily($enabledCardFamily)
    {
        $this->enabledCardFamily = $enabledCardFamily;
    }

    public function getInitialConsumer()
    {
        return $this->initialConsumer;
    }

    public function setInitialConsumer($initialConsumer)
    {
        $this->initialConsumer = $initialConsumer;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("merchantOrderId", $this->getMerchantOrderId())
            ->add("paymentGroup", $this->getPaymentGroup())
            ->add("paymentSource", $this->getPaymentSource())
            ->add("forceThreeDS", $this->getForceThreeDS())
            ->addArray("enabledInstallments", $this->getEnabledInstallments())
            ->add("enabledCardFamily", $this->getEnabledCardFamily())
            ->add("currency", $this->getCurrency())
            ->addPrice("price", $this->getPrice())
            ->addPrice("paidPrice", $this->getPaidPrice())
            ->addPrice("shippingPrice", $this->getShippingPrice())
            ->add("callbackUrl", $this->getCallbackUrl())
            ->add("termsUrl", $this->getTermsUrl())
            ->add("preSalesContractUrl", $this->getPreSalesContractUrl())
            ->addArray("orderItems", $this->getOrderItems())
            ->add("initialConsumer", $this->getInitialConsumer())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->append("merchantOrderId", $this->getMerchantOrderId())
            ->append("paymentGroup", $this->getPaymentGroup())
            ->append("paymentSource", $this->getPaymentSource())
            ->append("forceThreeDS", $this->getForceThreeDS())
            ->appendArray("enabledInstallments", $this->getEnabledInstallments())
            ->append("enabledCardFamily", $this->getEnabledCardFamily())
            ->append("currency", $this->getCurrency())
            ->appendPrice("price", $this->getPrice())
            ->appendPrice("paidPrice", $this->getPaidPrice())
            ->appendPrice("shippingPrice", $this->getShippingPrice())
            ->append("callbackUrl", $this->getCallbackUrl())
            ->append("termsUrl", $this->getTermsUrl())
            ->append("preSalesContractUrl", $this->getPreSalesContractUrl())
            ->appendArray("orderItems", $this->getOrderItems())
            ->append("initialConsumer", $this->getInitialConsumer())
            ->getRequestString();
    }
}