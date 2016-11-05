<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BasicPaymentResource;

class BasicPaymentResourceMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new BasicPaymentResourceMapper($rawResult);
    }

    public function mapBasicPaymentResourceFrom(BasicPaymentResource $payment, $jsonObject)
    {
        parent::mapResourceFrom($payment, $jsonObject);

        if (isset($jsonObject->price)) {
            $payment->setPrice($jsonObject->price);
        }
        if (isset($jsonObject->paidPrice)) {
            $payment->setPaidPrice($jsonObject->paidPrice);
        }
        if (isset($jsonObject->installment)) {
            $payment->setInstallment($jsonObject->installment);
        }
        if (isset($jsonObject->paymentId)) {
            $payment->setPaymentId($jsonObject->paymentId);
        }
        if (isset($jsonObject->merchantCommissionRate)) {
            $payment->setMerchantCommissionRate($jsonObject->merchantCommissionRate);
        }
        if (isset($jsonObject->merchantCommissionRateAmount)) {
            $payment->setMerchantCommissionRateAmount($jsonObject->merchantCommissionRateAmount);
        }
        if (isset($jsonObject->iyziCommissionFee)) {
            $payment->setIyziCommissionFee($jsonObject->iyziCommissionFee);
        }
        if (isset($jsonObject->cardType)) {
            $payment->setCardType($jsonObject->cardType);
        }
        if (isset($jsonObject->cardAssociation)) {
            $payment->setCardAssociation($jsonObject->cardAssociation);
        }
        if (isset($jsonObject->cardFamily)) {
            $payment->setCardFamily($jsonObject->cardFamily);
        }
        if (isset($jsonObject->cardToken)) {
            $payment->setCardToken($jsonObject->cardToken);
        }
        if (isset($jsonObject->cardUserKey)) {
            $payment->setCardUserKey($jsonObject->cardUserKey);
        }
        if (isset($jsonObject->binNumber)) {
            $payment->setBinNumber($jsonObject->binNumber);
        }
        if (isset($jsonObject->paymentTransactionId)) {
            $payment->setPaymentTransactionId($jsonObject->paymentTransactionId);
        }
        if (isset($jsonObject->authCode)) {
            $payment->setAuthCode($jsonObject->authCode);
        }
        if (isset($jsonObject->connectorName)) {
            $payment->setConnectorName($jsonObject->connectorName);
        }
        if (isset($jsonObject->currency)) {
            $payment->setCurrency($jsonObject->currency);
        }
        if (isset($jsonObject->phase)) {
            $payment->setPhase($jsonObject->phase);
        }
        return $payment;
    }

    public function mapBasicPaymentResource(BasicPaymentResource $payment)
    {
        return $this->mapBasicPaymentResourceFrom($payment, $this->jsonObject);
    }
}