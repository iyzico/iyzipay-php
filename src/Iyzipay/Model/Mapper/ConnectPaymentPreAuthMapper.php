<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectPaymentPreAuth;

class ConnectPaymentPreAuthMapper extends ConnectPaymentMapper
{
    public static function create()
    {
        return new ConnectPaymentPreAuthMapper();
    }

    public function map(ConnectPaymentPreAuth $payment, $jsonResult)
    {
        parent::map($payment, $jsonResult);

        return $payment;
    }
}