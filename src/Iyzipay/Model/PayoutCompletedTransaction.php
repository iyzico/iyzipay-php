<?php

namespace Iyzipay\Model;

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
}