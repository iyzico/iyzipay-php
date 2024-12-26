<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;

class SubMerchantPaymentItemResource extends IyzipayResource
{
    private $subMerchantKey;
    private $paymentTransactionId;
    private $subMerchantPrice;
    private $withholdingTax;


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

    public function getWithholdingTax()
    {
        return $this->withholdingTax;
    }

    public function setWithholdingTax($withholdingTax)
    {
        $this->withholdingTax = $withholdingTax;
    }
}