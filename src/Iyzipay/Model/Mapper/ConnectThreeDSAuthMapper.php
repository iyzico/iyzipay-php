<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectThreeDSAuth;

class ConnectThreeDSAuthMapper extends ConnectPaymentMapper
{
    public static function create()
    {
        return new ConnectThreeDSAuthMapper();
    }

    public function map(ConnectThreeDSAuth $auth, $jsonResult)
    {
        parent::map($auth, $jsonResult);
        return $auth;
    }
}