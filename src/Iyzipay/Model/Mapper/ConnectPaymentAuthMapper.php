<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectPaymentAuth;

class ConnectPaymentAuthMapper extends ConnectPaymentMapper
{
    public static function create()
    {
        return new ConnectPaymentAuthMapper();
    }

    public function map(ConnectPaymentAuth $auth, $jsonResult)
    {
        parent::map($auth, $jsonResult);
        return $auth;
    }
}