<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectPayment;

class ConnectPaymentMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new ConnectPaymentMapper();
    }

    public function mapConnectPayment(ConnectPayment $payment, $jsonResult)
    {
        parent::mapResource($payment, $jsonResult);

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
        if (isset($jsonResult->merchantCommissionRate)) {
            $payment->setMerchantCommissionRate($jsonResult->merchantCommissionRate);
        }
        if (isset($jsonResult->merchantCommissionRateAmount)) {
            $payment->setMerchantCommissionRateAmount($jsonResult->merchantCommissionRateAmount);
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
        if (isset($jsonResult->cardUserKey)) {
            $payment->setCardUserKey($jsonResult->cardUserKey);
        }
        if (isset($jsonResult->binNumber)) {
            $payment->setBinNumber($jsonResult->binNumber);
        }
        if (isset($jsonResult->paymentTransactionId)) {
            $payment->setPaymentTransactionId($jsonResult->paymentTransactionId);
        }
        if (isset($jsonResult->connectorName)) {
            $payment->setConnectorName($jsonResult->connectorName);
        }
        return $payment;
    }
}