<?php

namespace Iyzipay\Model;

use Iyzipay\JsonBuilder;
use Iyzipay\RequestStringBuilder;

class PayoutCompletedTransaction
{
    private $paymentTransactionId;
    private $payoutAmount;
    private $payoutType;
    private $subMerchantKey;

    public function getPaymentTransactionId()
    {
        return $this->paymentTransactionId;
    }

    public function setPaymentTransactionId($paymentTransactionId)
    {
        $this->paymentTransactionId = $paymentTransactionId;
    }

    public function getPayoutAmount()
    {
        return $this->payoutAmount;
    }

    public function setPayoutAmount($payoutAmount)
    {
        $this->payoutAmount = $payoutAmount;
    }

    public function getPayoutType()
    {
        return $this->payoutType;
    }

    public function setPayoutType($payoutType)
    {
        $this->payoutType = $payoutType;
    }

    public function getSubMerchantKey()
    {
        return $this->subMerchantKey;
    }

    public function setSubMerchantKey($subMerchantKey)
    {
        $this->subMerchantKey = $subMerchantKey;
    }

    public function getJsonObject()
    {
        return JsonBuilder::create()
            ->add("paymentTransactionId", $this->getPaymentTransactionId())
            ->add("payoutAmount", $this->getPayoutAmount())
            ->add("payoutType", $this->getPayoutType())
            ->add("subMerchantKey", $this->getSubMerchantKey())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::newInstance()
            ->append("paymentTransactionId", $this->getPaymentTransactionId())
            ->append("payoutAmount", $this->getPayoutAmount())
            ->append("payoutType", $this->getPayoutType())
            ->append("subMerchantKey", $this->getSubMerchantKey())
            ->getRequestString();
    }
}