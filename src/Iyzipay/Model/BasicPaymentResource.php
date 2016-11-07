<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;

class BasicPaymentResource extends IyzipayResource
{
    private $price;
    private $paidPrice;
    private $installment;
    private $currency;
    private $paymentId;
    private $merchantCommissionRate;
    private $merchantCommissionRateAmount;
    private $iyziCommissionFee;
    private $cardType;
    private $cardAssociation;
    private $cardFamily;
    private $cardToken;
    private $cardUserKey;
    private $binNumber;
    private $paymentTransactionId;
    private $authCode;
    private $connectorName;
    private $phase;

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

    public function getPaymentTransactionId()
    {
        return $this->paymentTransactionId;
    }

    public function setPaymentTransactionId($paymentTransactionId)
    {
        $this->paymentTransactionId = $paymentTransactionId;
    }

    public function getAuthCode()
    {
        return $this->authCode;
    }

    public function setAuthCode($authCode)
    {
        $this->authCode = $authCode;
    }

    public function getConnectorName()
    {
        return $this->connectorName;
    }

    public function setConnectorName($connectorName)
    {
        $this->connectorName = $connectorName;
    }

    public function getPhase()
    {
        return $this->phase;
    }

    public function setPhase($phase)
    {
        $this->phase = $phase;
    }
}