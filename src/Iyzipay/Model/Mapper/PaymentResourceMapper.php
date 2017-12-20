<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PaymentResource;

class PaymentResourceMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new PaymentResourceMapper($rawResult);
    }

    public function mapPaymentResourceFrom(PaymentResource $paymentResource, $jsonObject)
    {
        parent::mapResourceFrom($paymentResource, $jsonObject);

        if (isset($jsonObject->price)) {
            $paymentResource->setPrice($jsonObject->price);
        }
        if (isset($jsonObject->paidPrice)) {
            $paymentResource->setPaidPrice($jsonObject->paidPrice);
        }
        if (isset($jsonObject->installment)) {
            $paymentResource->setInstallment($jsonObject->installment);
        }
        if (isset($jsonObject->paymentId)) {
            $paymentResource->setPaymentId($jsonObject->paymentId);
        }
        if (isset($jsonObject->paymentStatus)) {
            $paymentResource->setPaymentStatus($jsonObject->paymentStatus);
        }
        if (isset($jsonObject->fraudStatus)) {
            $paymentResource->setFraudStatus($jsonObject->fraudStatus);
        }
        if (isset($jsonObject->merchantCommissionRate)) {
            $paymentResource->setMerchantCommissionRate($jsonObject->merchantCommissionRate);
        }
        if (isset($jsonObject->merchantCommissionRateAmount)) {
            $paymentResource->setMerchantCommissionRateAmount($jsonObject->merchantCommissionRateAmount);
        }
        if (isset($jsonObject->iyziCommissionRateAmount)) {
            $paymentResource->setIyziCommissionRateAmount($jsonObject->iyziCommissionRateAmount);
        }
        if (isset($jsonObject->iyziCommissionFee)) {
            $paymentResource->setIyziCommissionFee($jsonObject->iyziCommissionFee);
        }
        if (isset($jsonObject->cardType)) {
            $paymentResource->setCardType($jsonObject->cardType);
        }
        if (isset($jsonObject->cardAssociation)) {
            $paymentResource->setCardAssociation($jsonObject->cardAssociation);
        }
        if (isset($jsonObject->cardFamily)) {
            $paymentResource->setCardFamily($jsonObject->cardFamily);
        }
        if (isset($jsonObject->cardUserKey)) {
            $paymentResource->setCardUserKey($jsonObject->cardUserKey);
        }
        if (isset($jsonObject->cardToken)) {
            $paymentResource->setCardToken($jsonObject->cardToken);
        }
        if (isset($jsonObject->binNumber)) {
            $paymentResource->setBinNumber($jsonObject->binNumber);
        }
        if (isset($jsonObject->basketId)) {
            $paymentResource->setBasketId($jsonObject->basketId);
        }
        if (isset($jsonObject->currency)) {
            $paymentResource->setCurrency($jsonObject->currency);
        }
        if (isset($jsonObject->itemTransactions)) {
            $paymentResource->setPaymentItems(PaymentItemMapper::create()->mapPaymentItems($jsonObject->itemTransactions));
        }
        if (isset($jsonObject->connectorName)) {
            $paymentResource->setConnectorName($jsonObject->connectorName);
        }
        if (isset($jsonObject->authCode)) {
            $paymentResource->setAuthCode($jsonObject->authCode);
        }
        if (isset($jsonObject->phase)) {
            $paymentResource->setPhase($jsonObject->phase);
        }
        if (isset($jsonObject->lastFourDigits)) {
            $paymentResource->setLastFourDigits($jsonObject->lastFourDigits);
        }
        if (isset($jsonObject->posOrderId)) {
            $paymentResource->setPosOrderId($jsonObject->posOrderId);
        }
        return $paymentResource;
    }

    public function mapPaymentResource(PaymentResource $paymentResource)
    {
        return $this->mapPaymentResourceFrom($paymentResource, $this->jsonObject);
    }
}