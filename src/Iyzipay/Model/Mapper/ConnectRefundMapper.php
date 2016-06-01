<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectRefund;

class ConnectRefundMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new ConnectRefundMapper($rawResult);
    }

    public function mapConnectRefundFrom(ConnectRefund $refund, $jsonObject)
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
        if (isset($jsonObject->connectorName)) {
            $refund->setConnectorName($jsonObject->connectorName);
        }
        if (isset($jsonObject->currency)) {
            $refund->setCurrency($jsonObject->currency);
        }
        return $refund;
    }

    public function mapConnectRefund(ConnectRefund $refund)
    {
        return $this->mapConnectRefundFrom($refund, $this->jsonObject);
    }
}