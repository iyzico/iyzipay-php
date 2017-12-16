<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;

class PaymentResource extends IyzipayResource
{
    private $price;
    private $paidPrice;
    private $installment;
    private $currency;
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
    private $connectorName;
    private $authCode;
    private $phase;
    private $lastFourDigits;
    private $posOrderId;

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

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
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

    public function getConnectorName()
    {
        return $this->connectorName;
    }

    public function setConnectorName($connectorName)
    {
        $this->connectorName = $connectorName;
    }

    public function getAuthCode()
    {
        return $this->authCode;
    }

    public function setAuthCode($authCode)
    {
        $this->authCode = $authCode;
    }

    public function getPhase()
    {
        return $this->phase;
    }

    public function setPhase($phase)
    {
        $this->phase = $phase;
    }

    public function getLastFourDigits()
    {
        return $this->lastFourDigits;
    }

    public function setLastFourDigits($lastFourDigits)
    {
        $this->lastFourDigits = $lastFourDigits;
    }

    public function getPosOrderId()
    {
        return $this->posOrderId;
    }

    public function setPosOrderId($posOrderId)
    {
        $this->posOrderId = $posOrderId;
    }
}