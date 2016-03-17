<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectPaymentAuth;

class ConnectPaymentAuthMapper extends ConnectPaymentMapper
{
    public static function create($rawResult = null)
    {
        return new ConnectPaymentAuthMapper($rawResult);
    }

    public function mapConnectPaymentAuthFrom(ConnectPaymentAuth $auth, $jsonObject)
    {
        parent::mapConnectPaymentFrom($auth, $jsonObject);
        return $auth;
    }

    public function mapConnectPaymentAuth(ConnectPaymentAuth $auth)
    {
        return $this->mapConnectPaymentAuthFrom($auth, $this->jsonObject);
    }
}