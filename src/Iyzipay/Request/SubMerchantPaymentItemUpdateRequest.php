<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class SubMerchantPaymentItemUpdateRequest extends Request
{
    private $subMerchantKey;
    private $paymentTransactionId;
    private $subMerchantPrice;


    public function getSubMerchantKey()
    {
        return $this->subMerchantKey;
    }

    public function setSubMerchantKey($subMerchantKey)
    {
        $this->subMerchantKey = $subMerchantKey;
    }

    public function getPaymentTransactionId()
    {
        return $this->paymentTransactionId;
    }

    public function setPaymentTransactionId($paymentTransactionId)
    {
        $this->paymentTransactionId = $paymentTransactionId;
    }

    public function getSubMerchantPrice()
    {
        return $this->subMerchantPrice;
    }

    public function setSubMerchantPrice($subMerchantPrice)
    {
        $this->subMerchantPrice = $subMerchantPrice;
    }


    public function getJsonObject()
    {

        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("subMerchantKey", $this->getSubMerchantKey())
            ->add("paymentTransactionId", $this->getPaymentTransactionId())
            ->addPrice("subMerchantPrice", $this->getSubMerchantPrice())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->append("subMerchantKey", $this->getSubMerchantKey())
            ->append("paymentTransactionId", $this->getPaymentTransactionId())
            ->append("subMerchantPrice", $this->getSubMerchantPrice())
            ->getRequestString();
    }
}
