<?php

namespace Iyzipay\Model;

class ConvertedPayout
{
    private $paidPrice;
    private $iyziCommissionRateAmount;
    private $iyziCommissionFee;
    private $blockageRateAmountMerchant;
    private $blockageRateAmountSubMerchant;
    private $subMerchantPayoutAmount;
    private $merchantPayoutAmount;
    private $iyziConversionRate;
    private $iyziConversionRateAmount;
    private $currency;

    public function getPaidPrice()
    {
        return $this->paidPrice;
    }

    public function setPaidPrice($paidPrice)
    {
        $this->paidPrice = $paidPrice;
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

    public function getIyziConversionRate()
    {
        return $this->iyziConversionRate;
    }

    public function setIyziConversionRate($iyziConversionRate)
    {
        $this->iyziConversionRate = $iyziConversionRate;
    }

    public function getIyziConversionRateAmount()
    {
        return $this->iyziConversionRateAmount;
    }

    public function setIyziConversionRateAmount($iyziConversionRateAmount)
    {
        $this->iyziConversionRateAmount = $iyziConversionRateAmount;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }
}