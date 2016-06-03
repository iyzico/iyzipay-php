<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Refund;

class RefundMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new RefundMapper($rawResult);
    }

    public function mapRefundFrom(Refund $refund, $jsonObject)
    {
        parent::mapResourceFrom($refund, $jsonObject);

        if (isset($jsonObject->paymentId)) {
            $refund->setPaymentId($jsonObject->paymentId);
        }
        if (isset($jsonObject->paymentTransactionId)) {
            $refund->setPaymentTransactionId($jsonObject->paymentTransactionId);
        }
        if (isset($jsonObject->price)) {
            $refund->setPrice($jsonObject->price);
        }
        if (isset($jsonObject->currency)) {
            $refund->setCurrency($jsonObject->currency);
        }
        if (isset($jsonObject->connectorName)) {
            $refund->setConnectorName($jsonObject->connectorName);
        }
        return $refund;
    }

    public function mapRefund(Refund $refund)
    {
        return $this->mapRefundFrom($refund, $this->jsonObject);
    }
}