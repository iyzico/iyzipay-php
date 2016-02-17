<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\JsonBuilder;
use Iyzipay\RequestStringBuilder;

class Payment extends IyzipayResource
{
    private $price;
    private $paidPrice;
    private $installment;
    private $paymentId;
    private $paymentStatus;
    private $fraudStatus;
    private $merchantCommissionRate;
    private $merchantCommissionRateAmount;
    private $iyziCommissionRateAmount;
    private $iyziCommissionFee;
    private $cardType;
    private $cardAssociation;
    private $cardFamily;
    private $cardToken;
    private $cardUserKey;
    private $binNumber;
    private $basketId;
    private $paymentItems;

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

    public function getPaymentId()
    {
        return $this->paymentId;
    }

    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
    }

    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

    public function setPaymentStatus($paymentStatus)
    {
        $this->paymentStatus = $paymentStatus;
    }

    public function getFraudStatus()
    {
        return $this->fraudStatus;
    }

    public function setFraudStatus($fraudStatus)
    {
        $this->fraudStatus = $fraudStatus;
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

    public function getCardType()
    {
        return $this->cardType;
    }

    public function setCardType($cardType)
    {
        $this->cardType = $cardType;
    }

    public function getCardAssociation()
    {
        return $this->cardAssociation;
    }

    public function setCardAssociation($cardAssociation)
    {
        $this->cardAssociation = $cardAssociation;
    }

    public function getCardFamily()
    {
        return $this->cardFamily;
    }

    public function setCardFamily($cardFamily)
    {
        $this->cardFamily = $cardFamily;
    }

    public function getCardToken()
    {
        return $this->cardToken;
    }

    public function setCardToken($cardToken)
    {
        $this->cardToken = $cardToken;
    }

    public function getCardUserKey()
    {
        return $this->cardUserKey;
    }

    public function setCardUserKey($cardUserKey)
    {
        $this->cardUserKey = $cardUserKey;
    }

    public function getBinNumber()
    {
        return $this->binNumber;
    }

    public function setBinNumber($binNumber)
    {
        $this->binNumber = $binNumber;
    }

    public function getBasketId()
    {
        return $this->basketId;
    }

    public function setBasketId($basketId)
    {
        $this->basketId = $basketId;
    }

    public function getPaymentItems()
    {
        return $this->paymentItems;
    }

    public function setPaymentItems($paymentItems)
    {
        $this->paymentItems = $paymentItems;
    }

    public function getJsonObject()
    {
        return JsonBuilder::create()
            ->addPrice("price", $this->getPrice())
            ->addPrice("paidPrice", $this->getPaidPrice())
            ->add("installment", $this->getInstallment())
            ->add("paymentId", $this->getPaymentId())
            ->add("paymentStatus", $this->getPaymentStatus())
            ->add("fraudStatus", $this->getFraudStatus())
            ->add("merchantCommissionRate", $this->getMerchantCommissionRate())
            ->add("merchantCommissionRateAmount", $this->getMerchantCommissionRateAmount())
            ->add("iyziCommissionRateAmount", $this->getIyziCommissionRateAmount())
            ->add("iyziCommissionFee", $this->getIyziCommissionFee())
            ->add("cardType", $this->getCardType())
            ->add("cardAssociation", $this->getCardAssociation())
            ->add("cardFamily", $this->getCardFamily())
            ->add("cardToken", $this->getCardToken())
            ->add("cardUserKey", $this->getCardUserKey())
            ->add("binNumber", $this->getBinNumber())
            ->add("basketId", $this->getBasketId())
            ->addArray("paymentItems", $this->getPaymentItems())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::newInstance()
            ->appendPrice("price", $this->getPrice())
            ->appendPrice("paidPrice", $this->getPaidPrice())
            ->append("installment", $this->getInstallment())
            ->append("paymentId", $this->getPaymentId())
            ->append("paymentStatus", $this->getPaymentStatus())
            ->append("fraudStatus", $this->getFraudStatus())
            ->append("merchantCommissionRate", $this->getMerchantCommissionRate())
            ->append("merchantCommissionRateAmount", $this->getMerchantCommissionRateAmount())
            ->append("iyziCommissionRateAmount", $this->getIyziCommissionRateAmount())
            ->append("iyziCommissionFee", $this->getIyziCommissionFee())
            ->append("cardType", $this->getCardType())
            ->append("cardAssociation", $this->getCardAssociation())
            ->append("cardFamily", $this->getCardFamily())
            ->append("cardToken", $this->getCardToken())
            ->append("cardUserKey", $this->getCardUserKey())
            ->append("binNumber", $this->getBinNumber())
            ->append("basketId", $this->getBasketId())
            ->appendArray("paymentItems", $this->getPaymentItems())
            ->getRequestString();
    }
}