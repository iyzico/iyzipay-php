<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectPaymentAuth;

class ConnectPaymentAuthMapper extends ConnectPaymentMapper
{
    public static function create()
    {
        return new ConnectPaymentAuthMapper();
    }

    public function mapConnectPaymentAuth(ConnectPaymentAuth $auth, $jsonResult)
    {
        parent::mapConnectPayment($auth, $jsonResult);
        return $auth;
    }
}