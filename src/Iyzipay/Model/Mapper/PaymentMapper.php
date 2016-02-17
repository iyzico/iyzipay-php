<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Payment;

class PaymentMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new PaymentMapper();
    }

    public function map(Payment $payment, $jsonResult)
    {
        parent::map($payment, $jsonResult);

        if (isset($jsonResult->price)) {
            $payment->setPrice($jsonResult->price);
        }
        if (isset($jsonResult->paidPrice)) {
            $payment->setPaidPrice($jsonResult->paidPrice);
        }
        if (isset($jsonResult->installment)) {
            $payment->setInstallment($jsonResult->installment);
        }
        if (isset($jsonResult->paymentId)) {
            $payment->setPaymentId($jsonResult->paymentId);
        }
        if (isset($jsonResult->paymentStatus)) {
            $payment->setPaymentStatus($jsonResult->paymentStatus);
        }
        if (isset($jsonResult->fraudStatus)) {
            $payment->setFraudStatus($jsonResult->fraudStatus);
        }
        if (isset($jsonResult->merchantCommissionRate)) {
            $payment->setMerchantCommissionRate($jsonResult->merchantCommissionRate);
        }
        if (isset($jsonResult->merchantCommissionRateAmount)) {
            $payment->setMerchantCommissionRateAmount($jsonResult->merchantCommissionRateAmount);
        }
        if (isset($jsonResult->iyziCommissionRateAmount)) {
            $payment->setIyziCommissionRateAmount($jsonResult->iyziCommissionRateAmount);
        }
        if (isset($jsonResult->iyziCommissionFee)) {
            $payment->setIyziCommissionFee($jsonResult->iyziCommissionFee);
        }
        if (isset($jsonResult->cardType)) {
            $payment->setCardType($jsonResult->cardType);
        }
        if (isset($jsonResult->cardAssociation)) {
            $payment->setCardAssociation($jsonResult->cardAssociation);
        }
        if (isset($jsonResult->cardFamily)) {
            $payment->setCardFamily($jsonResult->cardFamily);
        }
        if (isset($jsonResult->cardToken)) {
            $payment->setCardToken($jsonResult->cardToken);
        }
        if (isset($jsonResult->binNumber)) {
            $payment->setBinNumber($jsonResult->binNumber);
        }
        if (isset($jsonResult->basketId)) {
            $payment->setBasketId($jsonResult->basketId);
        }
        if (isset($jsonResult->paymentItems)) {
            $payment->setPaymentItems($jsonResult->paymentItems);
        }
        return $payment;
    }
}