<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;

class SubMerchantPaymentItemResource extends IyzipayResource
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
}