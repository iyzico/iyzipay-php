<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectRefund;

class ConnectRefundMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new ConnectRefundMapper();
    }

    public function map(ConnectRefund $refund, $jsonResult)
    {
        parent::map($refund, $jsonResult);

        if (isset($jsonResult->paymentId)) {
            $refund->setPaymentId($jsonResult->paymentId);
        }
        if (isset($jsonResult->paymentTransactionId)) {
            $refund->setPaymentTransactionId($jsonResult->paymentTransactionId);
        }
        if (isset($jsonResult->price)) {
            $refund->setPrice($jsonResult->price);
        }
        if (isset($jsonResult->connectorName)) {
            $refund->setConnectorName($jsonResult->connectorName);
        }
        return $refund;
    }
}