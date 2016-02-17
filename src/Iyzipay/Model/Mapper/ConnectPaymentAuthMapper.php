<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectPaymentAuth;

class ConnectPaymentAuthMapper extends ConnectPaymentMapper
{
    public static function create()
    {
        return new ConnectPaymentAuthMapper();
    }

    public function map(ConnectPaymentAuth $payment, $jsonResult)
    {
        parent::map($payment, $jsonResult);

        return $payment;
    }
}