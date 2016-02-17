<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectPaymentPostAuth;

class ConnectPaymentPostAuthMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new ConnectPaymentPostAuthMapper();
    }

    public function map(ConnectPaymentPostAuth $payment, $jsonResult)
    {
        parent::map($payment, $jsonResult);

        if(isset($jsonResult->paymentId)) {
            $payment->setPaymentId($jsonResult->paymentId);
        }
        if(isset($jsonResult->price)) {
            $payment->setPrice($jsonResult->price);
        }
        if(isset($jsonResult->connectorName)) {
            $payment->setConnectorName($jsonResult->connectorName);
        }
        return $payment;
    }
}