<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectThreeDSAuth;

class ConnectThreeDSAuthMapper extends ConnectPaymentMapper
{
    public static function create()
    {
        return new ConnectThreeDSAuthMapper();
    }

    public function mapConnectThreeDSAuth(ConnectThreeDSAuth $auth, $jsonResult)
    {
        parent::mapConnectPayment($auth, $jsonResult);
        return $auth;
    }
}