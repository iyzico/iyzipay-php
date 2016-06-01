<?php

namespace Iyzipay\Model;

class PaymentItem
{
    private $itemId;
    private $paymentTransactionId;
    private $transactionStatus;
    private $price;
    private $paidPrice;
    private $merchantCommissionRate;
    private $merchantCommissionRateAmount;
    private $iyziCommissionRateAmount;
    private $iyziCommissionFee;
    private $blockageRate;
    private $blockageRateAmountMerchant;
    private $blockageRateAmountSubMerchant;
    private $blockageResolvedDate;
    private $subMerchantKey;
    private $subMerchantPrice;
    private $subMerchantPayoutRate;
    private $subMerchantPayoutAmount;
    private $merchantPayoutAmount;
    private $convertedPayout;

    public function getItemId()
    {
        return $this->itemId;
    }

    public function setItemId($itemId)
    {
        $this->itemId = $itemId;
    }

    public function getPaymentTransactionId()
    {
        return $this->paymentTransactionId;
    }

    public function setPaymentTransactionId($paymentTransactionId)
    {
        $this->paymentTransactionId = $paymentTransactionId;
    }

    public function getTransactionStatus()
    {
        return $this->transactionStatus;
    }

    public function setTransactionStatus($transactionStatus)
    {
        $this->transactionStatus = $transactionStatus;
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

    public function getMerchantCommissionRate()
    {
        return $this->merchantCommissionRate;
    }

    public function setMerchantCommissionRate($merchantCommissionRate)
    {
        $this->merchantCommissionRate = $merchantCommissionRate;
    }

    public function getMerchantCommissionRateAmount()
    {
        return $this->merchantCommissionRateAmount;
    }

    public function setMerchantCommissionRateAmount($merchantCommissionRateAmount)
    {
        $this->merchantCommissionRateAmount = $merchantCommissionRateAmount;
    }

    public function getIyziCommissionRateAmount()
    {
        return $this->iyziCommissionRateAmount;
    }

    public function setIyziCommissionRateAmount($iyziCommissionRateAmount)
    {
        $this->iyziCommissionRateAmount = $iyziCommissionRateAmount;
    }

    public function getIyziCommissionFee()
    {
        return $this->iyziCommissionFee;
    }

    public function setIyziCommissionFee($iyziCommissionFee)
    {
        $this->iyziCommissionFee = $iyziCommissionFee;
    }

    public function getBlockageRate()
    {
        return $this->blockageRate;
    }

    public function setBlockageRate($blockageRate)
    {
        $this->blockageRate = $blockageRate;
    }

    public function getBlockageRateAmountMerchant()
    {
        return $this->blockageRateAmountMerchant;
    }

    public function setBlockageRateAmountMerchant($blockageRateAmountMerchant)
    {
        $this->blockageRateAmountMerchant = $blockageRateAmountMerchant;
    }

    public function getBlockageRateAmountSubMerchant()
    {
        return $this->blockageRateAmountSubMerchant;
    }

    public function setBlockageRateAmountSubMerchant($blockageRateAmountSubMerchant)
    {
        $this->blockageRateAmountSubMerchant = $blockageRateAmountSubMerchant;
    }

    public function getBlockageResolvedDate()
    {
        return $this->blockageResolvedDate;
    }

    public function setBlockageResolvedDate($blockageResolvedDate)
    {
        $this->blockageResolvedDate = $blockageResolvedDate;
    }

    public function getSubMerchantKey()
    {
        return $this->subMerchantKey;
    }

    public function setSubMerchantKey($subMerchantKey)
    {
        $this->subMerchantKey = $subMerchantKey;
    }

    public function getSubMerchantPrice()
    {
        return $this->subMerchantPrice;
    }

    public function setSubMerchantPrice($subMerchantPrice)
    {
        $this->subMerchantPrice = $subMerchantPrice;
    }

    public function getSubMerchantPayoutRate()
    {
        return $this->subMerchantPayoutRate;
    }

    public function setSubMerchantPayoutRate($subMerchantPayoutRate)
    {
        $this->subMerchantPayoutRate = $subMerchantPayoutRate;
    }

    public function getSubMerchantPayoutAmount()
    {
        return $this->subMerchantPayoutAmount;
    }

    public function setSubMerchantPayoutAmount($subMerchantPayoutAmount)
    {
        $this->subMerchantPayoutAmount = $subMerchantPayoutAmount;
    }

    public function getMerchantPayoutAmount()
    {
        return $this->merchantPayoutAmount;
    }

    public function setMerchantPayoutAmount($merchantPayoutAmount)
    {
        $this->merchantPayoutAmount = $merchantPayoutAmount;
    }

    public function getConvertedPayout()
    {
        return $this->convertedPayout;
    }

    public function setConvertedPayout($convertedPayout)
    {
        $this->convertedPayout = $convertedPayout;
    }
}