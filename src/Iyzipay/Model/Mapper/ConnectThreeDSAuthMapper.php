<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectThreeDSAuth;

class ConnectThreeDSAuthMapper extends ConnectPaymentMapper
{
    public static function create($rawResult = null)
    {
        return new ConnectThreeDSAuthMapper($rawResult);
    }

    public function mapConnectThreeDSAuthFrom(ConnectThreeDSAuth $auth, $jsonObject)
    {
        parent::mapConnectPaymentFrom($auth, $jsonObject);
        return $auth;
    }

    public function mapConnectThreeDSAuth(ConnectThreeDSAuth $auth)
    {
        return $this->mapConnectThreeDSAuthFrom($auth, $this->jsonObject);
    }
}